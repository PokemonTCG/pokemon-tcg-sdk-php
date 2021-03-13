<?php

use GuzzleHttp\Psr7\Response;
use Pokemon\Models\Legalities;
use Pokemon\Models\Pagination;
use Pokemon\Models\Set;
use Pokemon\Models\SetImages;
use Pokemon\Pokemon;

/**
 * Class SetTest
 */
class SetTest extends TestCase
{

    /**
     * @return string
     */
    protected function fixtureDirectory(): string
    {
        return 'sets';
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
     * Test invalid set code
     */
    public function testFindWithInvalidCodeThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Pokemon::Options($this->clientOptions);
        Pokemon::Set()->find('invalid');
    }

    /**
     * Test find set by code
     */
    public function testFindReturnOneSet(): void
    {
        /** @var Set $set */
        Pokemon::Options($this->clientOptions);
        $set = Pokemon::Set()->find('g1');

        $this->assertInstanceOf(Set::class, $set);
        $this->assertEquals('g1', $set->getId());
        $this->assertEquals('Generations', $set->getName());
        $this->assertEquals('XY', $set->getSeries());
        $this->assertEquals(115, $set->getPrintedTotal());
        $this->assertEquals(115, $set->getTotal());

        $legalities = $set->getLegalities();
        $this->assertInstanceOf(Legalities::class, $legalities);
        $this->assertEquals('Legal', $legalities->getUnlimited());
        $this->assertEquals('Legal', $legalities->getExpanded());

        $this->assertEquals('GEN', $set->getPtcgoCode());
        $this->assertEquals('2016/02/22', $set->getReleaseDate());

        $images = $set->getImages();
        $this->assertInstanceOf(SetImages::class, $images);
        $this->assertEquals('https://images.pokemontcg.io/g1/symbol.png', $images->getSymbol());
        $this->assertEquals('https://images.pokemontcg.io/g1/logo.png', $images->getLogo());
    }

    /**
     * Test page and page size
     */
    public function testPageAndPageSizeReturnsSets(): void
    {
        Pokemon::Options($this->clientOptions);
        $sets = Pokemon::Set()->page(1)->pageSize(10)->all();
        $this->assertEquals(10, count($sets));
        foreach ($sets as $set) {
            $this->assertInstanceOf(Set::class, $set);
        }
    }

    /**
     * Test pagination
     */
    public function testPagination(): void
    {
        /** @var Pagination $pagination */
        Pokemon::Options($this->clientOptions);
        $pagination = Pokemon::Set()->page(1)->pageSize(10)->pagination();

        $this->assertInstanceOf(Pagination::class, $pagination);
        $this->assertEquals(1, $pagination->getPage());
        $this->assertEquals(10, $pagination->getPageSize());
        $this->assertEquals(10, $pagination->getCount());
        $this->assertEquals(121, $pagination->getTotalCount());
        $this->assertEquals(13, $pagination->getTotalPages());
    }

    /**
     * Test find all sets with query
     */
    public function testWhereFiltersOnSets(): void
    {
        Pokemon::Options($this->clientOptions);
        $sets = Pokemon::Set()->where(['legalities.standard' => 'legal'])->all();

        /** @var Set $set */
        foreach ($sets as $set) {
            $this->assertInstanceOf(Set::class, $set);
            $this->assertEquals(true, $set->getLegalities()->getStandard() === 'Legal');
        }
    }

}