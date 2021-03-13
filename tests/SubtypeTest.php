<?php

use DMS\PHPUnitExtensions\ArraySubset\ArraySubsetAsserts;
use GuzzleHttp\Psr7\Response;
use Pokemon\Pokemon;

/**
 * Class SubtypeTest
 */
class SubtypeTest extends TestCase
{
    use ArraySubsetAsserts;

    /**
     * @return string
     */
    protected function fixtureDirectory(): string
    {
        return 'subtypes';
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
     * Get all subtypes
     */
    public function testAllReturnsAllSubtypes(): void
    {
        Pokemon::Options($this->clientOptions);
        $subtypes = Pokemon::Subtype()->all();

        $this->assertEquals(23, count($subtypes));
        $this->assertArraySubset(['BREAK', 'Baby', 'Basic', 'EX', 'GX'], $subtypes);
    }
}