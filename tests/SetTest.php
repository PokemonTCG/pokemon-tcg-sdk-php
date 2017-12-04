<?php

use GuzzleHttp\Psr7\Response;
use Pokemon\Models\Set;
use Pokemon\Pokemon;

/**
 * Class SetTest
 */
class SetTest extends TestCase
{

    /**
     * @return string
     */
    protected function fixtureDirectory()
    {
        return 'sets';
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
     * Test invalid set code
     */
    public function testFindWithInvalidCodeThrowsException()
    {
        $this->setExpectedException(InvalidArgumentException::class);
        Pokemon::Set($this->clientOptions)->find('invalid');
    }

    /**
     * Test find set by code
     */
    public function testFindReturnOneSet()
    {
        /** @var Set $set */
        $set = Pokemon::Set($this->clientOptions)->find('g1');

        $this->assertInstanceOf(Set::class, $set);
        $this->assertEquals('g1', $set->getCode());
        $this->assertEquals('GEN', $set->getPtcgoCode());
        $this->assertEquals('Generations', $set->getName());
        $this->assertEquals('XY', $set->getSeries());
        $this->assertEquals(115, $set->getTotalCards());
        $this->assertEquals(true, $set->isStandardLegal());
        $this->assertEquals(true, $set->isExpandedLegal());
        $this->assertEquals('02/22/2016', $set->getReleaseDate());
        $this->assertEquals('https://images.pokemontcg.io/g1/symbol.png', $set->getSymbolUrl());
        $this->assertEquals('https://images.pokemontcg.io/g1/logo.png', $set->getLogoUrl());
    }

    /**
     * Test page size and page
     */
    public function testWhereWithPageSizeAndPageReturnsSets()
    {
        $sets = Pokemon::Set($this->clientOptions)->where(['pageSize' => 10])->where(['page' => 1])->all();
        $this->assertEquals(10, count($sets));
        foreach ($sets as $set) {
            $this->assertInstanceOf(Set::class, $set);
        }
    }

    /**
     * Test find all sets with query
     */
    public function testWhereFiltersOnSets()
    {
        $sets = Pokemon::Set($this->clientOptions)->where(['standardLegal' => "true"])->all();

        /** @var Set $set */
        foreach ($sets as $set) {
            $this->assertInstanceOf(Set::class, $set);
            $this->assertEquals(true, $set->isStandardLegal());
        }
    }

}