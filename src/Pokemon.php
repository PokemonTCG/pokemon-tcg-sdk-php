<?php

namespace Pokemon;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Pokemon
 *
 * @package Pokemon
 */
class Pokemon
{
    const API_URL = 'https://api.pokemontcg.io/v1/';

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
    protected $uri = '';

    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @var array
     */
    protected $params = [];

    /**
     * Pokemon constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => self::API_URL
        ]);
    }

    /**
     * @return Request
     */
    protected function buildRequest()
    {
        if (!empty($this->params)) {
            $this->uri = $this->uri . '?' . http_build_query($this->params);
        }
        return new Request($this->method, $this->uri, $this->headers);
    }

    /**
     * @param ResponseInterface $response
     *
     * @return string
     */
    protected function parseRequest(ResponseInterface $response)
    {
        return $response->getBody()->getContents();
    }

    /**
     * @return Pokemon
     */
    public function cards()
    {
        $this->uri = 'cards';
        return $this;
    }

    /**
     * @param $parameter
     * @param $query
     *
     * @return Pokemon
     */
    public function where($parameter, $query)
    {
        $this->params = array_merge($this->params, [$parameter => $query]);
        return $this;
    }

    /**
     * @return string
     */
    public function all()
    {
        return $this->parseRequest($this->client->send($this->buildRequest()));
    }
}