<?php

use Pokemon\Pokemon;
use Tests\Lib\TestCase;
use GuzzleHttp\Psr7\Response;
use DMS\PHPUnitExtensions\ArraySubset\ArraySubsetAsserts;

/**
 * Class TypesTest
 */
class TypeTest extends TestCase
{

    use ArraySubsetAsserts;

    /**
     * @return string
     */
    protected function fixtureDirectory()
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
    public function testAllReturnsAllTypes()
    {
        $types = Pokemon::Type($this->clientOptions)->all();

        $this->assertEquals(12, count($types));
        $this->assertArraySubset(['Colorless', 'Dark'], $types);
    }
}