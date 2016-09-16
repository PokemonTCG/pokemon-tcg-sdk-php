<?php

use GuzzleHttp\Psr7\Response;
use Pokemon\Pokemon;

/**
 * Class TypesTest
 */
class TypeTest extends TestCase
{

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
    protected function setUp()
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