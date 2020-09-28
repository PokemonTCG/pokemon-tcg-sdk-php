<?php

use Pokemon\Pokemon;
use Tests\Lib\TestCase;
use GuzzleHttp\Psr7\Response;
use DMS\PHPUnitExtensions\ArraySubset\ArraySubsetAsserts;

/**
 * Class SubtypeTest
 */
class SubtypeTest extends TestCase
{
    use ArraySubsetAsserts;
    
    /**
     * @return string
     */
    protected function fixtureDirectory()
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
    public function testAllReturnsAllSubtypes()
    {
        $subtypes = Pokemon::Subtype($this->clientOptions)->all();

        $this->assertEquals(17, count($subtypes));
        $this->assertArraySubset(['MEGA', 'Item', 'Level Up', 'Supporter'], $subtypes);
    }
}