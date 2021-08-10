<?php

use GuzzleHttp\Psr7\Response;
use Pokemon\Models\Ability;
use Pokemon\Models\Attack;
use Pokemon\Models\Card;
use Pokemon\Models\CardImages;
use Pokemon\Models\CardMarket;
use Pokemon\Models\CardMarketPrices;
use Pokemon\Models\Legalities;
use Pokemon\Models\Pagination;
use Pokemon\Models\Prices;
use Pokemon\Models\PriceTiers;
use Pokemon\Models\Set;
use Pokemon\Models\SetImages;
use Pokemon\Models\TCGPlayer;
use Pokemon\Models\Weakness;
use Pokemon\Pokemon;

/**
 * Class CardTest
 */
class CardTest extends TestCase
{

    /**
     * @return string
     */
    protected function fixtureDirectory(): string
    {
        return 'cards';
    }

    /**
     * Run before tests
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpClientResponses([
            new Response(404),
            new Response(200, [], $this->getFixture('find.json')),
            new Response(200, [], $this->getFixture('page.json')),
            new Response(200, [], $this->getFixture('page.json')),
            new Response(200, [], $this->getFixture('filtered.json')),
        ]);
    }

    /**
     * Test invalid card id
     */
    public function testFindWithInvalidIdThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Pokemon::Options($this->clientOptions);
        Pokemon::Card()->find('invalid');
    }

    /**
     * Test find card
     */
    public function testFindReturnsOneCard(): void
    {
        /** @var Card $card */
        Pokemon::Options($this->clientOptions);
        $card = Pokemon::Card()->find('xy7-57');

        $this->assertInstanceOf(Card::class, $card);
        $this->assertEquals('xy7-57', $card->getId());
        $this->assertEquals('Giratina-EX', $card->getName());
        $this->assertEquals('Pokémon', $card->getSupertype());
        $this->assertEquals(['Basic', 'EX'], $card->getSubtypes());
        $this->assertEquals('170', $card->getHp());
        $this->assertEquals(['Dragon'], $card->getTypes());
        $this->assertEquals(['Pokémon-EX rule: When a Pokémon-EX has been Knocked Out, your opponent takes 2 Prize cards.'], $card->getRules());

        $ability = $card->getAbilities()[0];
        $this->assertInstanceOf(Ability::class, $ability);
        $this->assertEquals('Renegade Pulse', $ability->getName());
        $this->assertEquals('Prevent all effects of attacks, including damage, done to this Pokémon by your opponent\'s Mega Evolution Pokémon.', $ability->getText());
        $this->assertEquals('Ability', $ability->getType());

        $attack = $card->getAttacks()[0];
        $this->assertInstanceOf(Attack::class, $attack);
        $this->assertEquals('Chaos Wheel', $attack->getName());
        $this->assertEquals(['Grass', 'Psychic', 'Colorless', 'Colorless'], $attack->getCost());
        $this->assertEquals(4, $attack->getConvertedEnergyCost());
        $this->assertEquals('100', $attack->getDamage());
        $this->assertEquals('Your opponent can\'t play any Pokémon Tool, Special Energy, or Stadium cards from his or her hand during his or her next turn.', $attack->getText());

        $weakness = $card->getWeaknesses()[0];
        $this->assertInstanceOf(Weakness::class, $weakness);
        $this->assertEquals('Fairy', $weakness->getType());
        $this->assertEquals('×2', $weakness->getValue());

        $this->assertEquals(['Colorless', 'Colorless', 'Colorless'], $card->getRetreatCost());
        $this->assertEquals(3, $card->getConvertedRetreatCost());

        $set = $card->getSet();
        $this->assertInstanceOf(Set::class, $set);
        $this->assertEquals('xy7', $set->getId());
        $this->assertEquals('Ancient Origins', $set->getName());
        $this->assertEquals('XY', $set->getSeries());
        $this->assertEquals(98, $set->getPrintedTotal());
        $this->assertEquals(100, $set->getTotal());

        $legalities = $set->getLegalities();
        $this->assertInstanceOf(Legalities::class, $legalities);
        $this->assertEquals('Legal', $legalities->getUnlimited());
        $this->assertEquals('Legal', $legalities->getExpanded());

        $this->assertEquals('AOR', $set->getPtcgoCode());
        $this->assertEquals('2015/08/12', $set->getReleaseDate());

        $images = $set->getImages();
        $this->assertInstanceOf(SetImages::class, $images);
        $this->assertEquals('https://images.pokemontcg.io/xy7/symbol.png', $images->getSymbol());
        $this->assertEquals('https://images.pokemontcg.io/xy7/logo.png', $images->getLogo());

        $this->assertEquals('57', $card->getNumber());
        $this->assertEquals('PLANETA', $card->getArtist());
        $this->assertEquals('Rare Holo EX', $card->getRarity());
        $this->assertEquals([487], $card->getNationalPokedexNumbers());

        $legalities = $card->getLegalities();
        $this->assertInstanceOf(Legalities::class, $legalities);
        $this->assertEquals('Legal', $legalities->getUnlimited());
        $this->assertEquals('Legal', $legalities->getExpanded());

        $images = $card->getImages();
        $this->assertInstanceOf(CardImages::class, $images);
        $this->assertEquals('https://images.pokemontcg.io/xy7/57.png', $images->getSmall());
        $this->assertEquals('https://images.pokemontcg.io/xy7/57_hires.png', $images->getLarge());

        $tcgplayer = $card->getTcgplayer();
        $this->assertInstanceOf(TCGPlayer::class, $tcgplayer);
        $this->assertEquals('https://prices.pokemontcg.io/tcgplayer/xy7-57', $tcgplayer->getUrl());

        $prices = $tcgplayer->getPrices();
        $this->assertInstanceOf(Prices::class, $prices);

        $cardMarket = $card->getCardMarket();
        $this->assertInstanceOf(CardMarket::class, $cardMarket);
        $this->assertEquals('https://prices.pokemontcg.io/cardmarket/xy7-57', $cardMarket->getUrl());

        $cardMarketPrices = $cardMarket->getPrices();
        $this->assertInstanceOf(CardMarketPrices::class, $cardMarketPrices);

        $holofoil = $prices->getHolofoil();
        $this->assertInstanceOf(PriceTiers::class, $holofoil);
        $this->assertEquals(3.7, $holofoil->getLow());
        $this->assertEquals(8.0, $holofoil->getMid());
        $this->assertEquals(14.9, $holofoil->getHigh());
        $this->assertEquals(6.0, $holofoil->getMarket());
        $this->assertEquals(9.99, $holofoil->getDirectLow());

        $this->assertEmpty($prices->getNormal());
        $this->assertEmpty($prices->getReverseHolofoil());
        $this->assertEmpty($prices->getFirstEditionNormal());

        $this->assertEmpty($card->getResistances());
        $this->assertEmpty($card->getAncientTrait());
    }

    /**
     * Test page and page size
     */
    public function testPageAndPageSizeReturnsCards(): void
    {
        Pokemon::Options($this->clientOptions);
        $cards = Pokemon::Card()->page(1)->pageSize(10)->all();
        $this->assertEquals(10, count($cards));
        foreach ($cards as $card) {
            $this->assertInstanceOf(Card::class, $card);
        }
    }

    /**
     * Test pagination
     */
    public function testPagination(): void
    {
        /** @var Pagination $pagination */
        Pokemon::Options($this->clientOptions);
        $pagination = Pokemon::Card()->page(1)->pageSize(10)->pagination();

        $this->assertInstanceOf(Pagination::class, $pagination);
        $this->assertEquals(1, $pagination->getPage());
        $this->assertEquals(10, $pagination->getPageSize());
        $this->assertEquals(10, $pagination->getCount());
        $this->assertEquals(13223, $pagination->getTotalCount());
        $this->assertEquals(1323, $pagination->getTotalPages());
    }

    /**
     * Test find all cards with query
     */
    public function testWhereFiltersOnCards(): void
    {
        Pokemon::Options($this->clientOptions);
        $cards = Pokemon::Card()->where([
            'supertype' => 'pokemon',
            'subtypes' => 'basic',
            'set.name' => 'roaring skies',
            'types' => 'grass',
        ])->all();

        /** @var Card $card */
        foreach ($cards as $card) {
            $this->assertInstanceOf(Card::class, $card);
            $this->assertEquals('Pokémon', $card->getSupertype());
            $this->assertContains('Basic', $card->getSubtypes());
            $this->assertEquals('Roaring Skies', $card->getSet()->getName());
            $this->assertContains('Grass', $card->getTypes());
        }
    }
}