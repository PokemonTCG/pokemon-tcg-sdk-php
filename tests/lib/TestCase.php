<?php

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * Class TestCase
 */
abstract class TestCase extends PHPUnitTestCase
{
    /**
     * @var array
     */
    protected $clientOptions = [];

    /**
     * @var array
     */
    protected $clientHeaders = ['Content-Type' => 'application/json; charset=utf-8'];

    /**
     * Run before tests
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->clientOptions = array_merge($this->clientOptions, ['verify' => getenv('CLIENT_OPTION_VERIFY')]);
    }

	/**
	 * @return string
	 */
    abstract protected function fixtureDirectory();

	/**
	 * @param $file
	 *
	 * @return string
	 */
	protected function getFixture($file)
	{
		$path = __DIR__ . '/fixtures/' . $this->fixtureDirectory() . '/';
		return file_get_contents($path . $file);
	}

    /**
     * Call this in setUp() to mock api responses in test cases.
     *
     * @param array $responses
     */
    protected function setUpClientResponses(array $responses = [])
    {
        $mock = new MockHandler($responses);
        $handler = HandlerStack::create($mock);
        $this->clientOptions = array_merge($this->clientOptions, ['handler' => $handler]);
    }

}