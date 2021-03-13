<?php

use DMS\PHPUnitExtensions\ArraySubset\ArraySubsetAsserts;
use GuzzleHttp\Psr7\Response;
use Pokemon\Pokemon;

/**
 * Class TypeTest
 */
class TypeTest extends TestCase
{
    use ArraySubsetAsserts;

    /**
     * @return string
     */
    protected function fixtureDirectory(): string
    {
        return 'types';
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
        $types = Pokemon::Type()->all();

        $this->assertEquals(11, count($types));
        $this->assertArraySubset(['Colorless', 'Darkness', 'Dragon', 'Fairy'], $types);
    }
}