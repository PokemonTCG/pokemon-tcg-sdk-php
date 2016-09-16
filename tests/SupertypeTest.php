<?php

use GuzzleHttp\Psr7\Response;
use Pokemon\Pokemon;

/**
 * Class SubtypeTest
 */
class SupertypeTest extends TestCase
{

    /**
     * @return string
     */
    protected function fixtureDirectory()
    {
        return 'supertypes';
    }

    /**
     * Run before tests
     */
    protected function setUp()
    {
        parent::setUp();

        $this->setUpClientResponses([
            new Response(200, [], $this->getFixture('all.json')),
        ]);
    }

    /**
     * Get all supertypes
     */
    public function testAllReturnsAllSupertypes()
    {
        $supertypes = Pokemon::Supertype($this->clientOptions)->all();

        $this->assertEquals(3, count($supertypes));
        $this->assertEquals(['Pokémon', 'Energy', 'Trainer'], $supertypes);
    }
}