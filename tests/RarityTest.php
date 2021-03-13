<?php

use DMS\PHPUnitExtensions\ArraySubset\ArraySubsetAsserts;
use GuzzleHttp\Psr7\Response;
use Pokemon\Pokemon;

/**
 * Class RarityTest
 */
class RarityTest extends TestCase
{
    use ArraySubsetAsserts;

    /**
     * @return string
     */
    protected function fixtureDirectory(): string
    {
        return 'rarities';
    }

    /**
     * Run before tests
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpClientResponses([
            new Response(200, [], $this->getFixture('all.json')),
        ]);
    }

    /**
     * Get all types
     */
    public function testAllReturnsAllTypes(): void
    {
        Pokemon::Options($this->clientOptions);
        $rarities = Pokemon::Rarity()->all();

        $this->assertEquals(23, count($rarities));
        $this->assertArraySubset(['Amazing Rare', 'Common', 'LEGEND', 'Promo'], $rarities);
    }
}