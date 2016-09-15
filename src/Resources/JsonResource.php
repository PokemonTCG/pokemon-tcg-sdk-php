<?php

namespace Pokemon\Resources;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Pokemon\Pokemon;
use Pokemon\Resources\Interfaces\ResourceInterface;
use Psr\Http\Message\ResponseInterface;
use stdClass;

/**
 * Class JsonResource
 *
 * @package Pokemon\Resources
 */
class JsonResource implements ResourceInterface
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
     * @param array  $options
     */
    public function __construct($uri, array $options = [])
    {
        $defaults = [
            'base_uri' => Pokemon::API_URL,
            'verify'   => false,
        ];
        $this->uri = $uri;
        $this->client = new Client(array_merge($defaults, $options));
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
    protected function getResponseData(ResponseInterface $response)
    {
        return json_decode($response->getBody()->getContents());
    }

    /**
     * @param stdClass $data
     *
     * @return array
     */
    protected function transformAll(stdClass $data)
    {
        return $this->getFirstProperty($data);
    }

    /**
     * @param stdClass $data
     *
     * @return string|null
     */
    protected function getFirstPropertyName(stdClass $data)
    {
        $attributes = get_object_vars($data);

        return (count($attributes) > 0) ? array_keys($attributes)[0] : null;
    }

    /**
     * @param stdClass $data
     *
     * @return mixed
     */
    protected function getFirstProperty(stdClass $data)
    {
        return $data->{$this->getFirstPropertyName($data)};
    }

    /**
     * @return array
     */
    public function all()
    {
        $data = $this->getResponseData($this->client->send($this->prepare()));

        return $this->transformAll($data);
    }
}