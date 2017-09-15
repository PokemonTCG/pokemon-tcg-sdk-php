<?php

use GuzzleHttp\Psr7\Response;
use Pokemon\Models\Ability;
use Pokemon\Models\Attack;
use Pokemon\Models\Card;
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
    protected function fixtureDirectory()
    {
        return 'cards';
    }

    /**
     * Run before tests
     */
    protected function setUp()
    {
        parent::setUp();

        $this->setUpClientResponses([
            new Response(404),
            new Response(200, [], $this->getFixture('find.json')),
            new Response(200, [], $this->getFixture('page.json')),
            new Response(200, [], $this->getFixture('filtered.json')),
        ]);
    }

    /**
     * Test invalid card id
     */
    public function testFindWithInvalidIdThrowsException()
    {
        $this->setExpectedException(InvalidArgumentException::class);
        Pokemon::Card($this->clientOptions)->find('invalid');
    }

    /**
     * Test find card
     */
    public function testFindReturnsOneCard()
    {
        /** @var Card $card */
        $card = Pokemon::Card($this->clientOptions)->find('xy7-57');

        $this->assertInstanceOf(Card::class, $card);
        $this->assertEquals('xy7-57', $card->getId());
        $this->assertEquals('Giratina-EX', $card->getName());
        $this->assertEquals(487, $card->getNationalPokedexNumber());
        $this->assertEquals('https://images.pokemontcg.io/xy7/54.png', $card->getImageUrl());
        $this->assertEquals('https://images.pokemontcg.io/xy7/54_hires.png', $card->getImageUrlHiRes());
        $this->assertEquals('EX', $card->getSubtype());
        $this->assertEquals('Pokémon', $card->getSupertype());
        $this->assertEquals('170', $card->getHp());
        $this->assertEquals(['Colorless', 'Colorless', 'Colorless'], $card->getRetreatCost());
        $this->assertEquals(['When a Pokémon-EX has been Knocked Out, your opponent takes 2 Prize cards.'], $card->getText());
        $this->assertEquals('57', $card->getNumber());
        $this->assertEquals('PLANETA', $card->getArtist());
        $this->assertEquals('Rare Holo EX', $card->getRarity());
        $this->assertEquals('XY', $card->getSeries());
        $this->assertEquals('Ancient Origins', $card->getSet());
        $this->assertEquals('xy7', $card->getSetCode());
        $this->assertEquals(['Dragon'], $card->getTypes());

        $this->assertInstanceOf(Ability::class, $card->getAbility());
        $this->assertEquals('Renegade Pulse', $card->getAbility()->getName());
        $this->assertEquals('Prevent all effects of attacks, including damage, done to this Pokémon by your opponent\'s Mega Evolution Pokémon.', $card->getAbility()->getText());
        $this->assertEquals('Ability', $card->getAbility()->getType());

        /** @var Attack $attack */
        $attack = $card->getAttacks()[0];
        $this->assertInstanceOf(Attack::class, $attack);
        $this->assertEquals(['Grass', 'Psychic', 'Colorless', 'Colorless'], $attack->getCost());
        $this->assertEquals('Chaos Wheel', $attack->getName());
        $this->assertEquals('Your opponent can\'t play any Pokémon Tool, Special Energy, or Stadium cards from his or her hand during his or her next turn.', $attack->getText());
        $this->assertEquals('100', $attack->getDamage());
        $this->assertEquals(4, $attack->getConvertedEnergyCost());

        /** @var Weakness $weakness */
        $weakness = $card->getWeaknesses()[0];
        $this->assertInstanceOf(Weakness::class, $weakness);
        $this->assertEquals('Fairy', $weakness->getType());
        $this->assertEquals('×2', $weakness->getValue());

        $this->assertEmpty($card->getResistances());
        $this->assertEmpty($card->getAncientTrait());
    }

    /**
     * Test page size and page
     */
    public function testWhereWithPageSizeAndPageReturnsCards()
    {
        $cards = Pokemon::Card($this->clientOptions)->where(['pageSize' => 10])->where(['page' => 1])->all();
        $this->assertEquals(10, count($cards));
        foreach ($cards as $card) {
            $this->assertInstanceOf(Card::class, $card);
        }
    }

    /**
     * Test find all cards with query
     */
    public function testWhereFiltersOnCards()
    {
        $cards = Pokemon::Card($this->clientOptions)->where(['supertype' => 'pokemon', 'subtype' => 'basic', 'set' => 'roaring skies'])->all();

        /** @var Card $card */
        foreach ($cards as $card) {
            $this->assertInstanceOf(Card::class, $card);
            $this->assertEquals('Pokémon', $card->getSupertype());
            $this->assertEquals('Basic', $card->getSubtype());
            $this->assertEquals('Roaring Skies', $card->getSet());
        }
    }
}