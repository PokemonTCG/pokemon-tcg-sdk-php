<?php

namespace Pokemon\Resources;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Pokemon\Pokemon;
use Pokemon\Resources\Interfaces\ResourceInterface;
use Psr\Http\Message\ResponseInterface;
use stdClass;

/**
 * Class Resource
 *
 * @package Pokemon\Resources
 */
class Resource implements ResourceInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $method = 'GET';

    /**
     * @var string
     */
    protected $uri;

    /**
     * Request constructor.
     *
     * @param string $uri
     */
    public function __construct($uri)
    {
        $this->client = new Client([
            'base_uri' => Pokemon::API_URL,
            'verify'   => false,
        ]);
        $this->uri = $uri;
    }

    /**
     * @return Request
     */
    protected function prepare()
    {
        return new Request($this->method, $this->uri);
    }

    /**
     * @param ResponseInterface $response
     *
     * @return mixed
     */
    protected function parseResponse(ResponseInterface $response)
    {
        $data = json_decode($response->getBody()->getContents());
        return $this->format($data);
    }

    /**
     * @param stdClass $data
     *
     * @return mixed
     */
    protected function format(stdClass $data)
    {
        return $data;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->parseResponse($this->client->send($this->prepare()));
    }
}