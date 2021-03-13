<?php

namespace Pokemon\Resources;

use Doctrine\Inflector\Inflector;
use Doctrine\Inflector\InflectorFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
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
    protected $resource;

    /**
     * @var Inflector
     */
    protected $inflector;

    /**
     * Request constructor.
     *
     * @param string $resource
     * @param array $options
     * @param string|null $apiKey
     */
    public function __construct($resource, array $options = [], ?string $apiKey = null)
    {
        $defaults = [
            'base_uri' => Pokemon::API_URL,
            'verify' => false,
        ];

        if (!empty($apiKey)) {
            $defaults['headers'] = [
                'X-Api-Key' => $apiKey,
            ];
        }

        $this->resource = $resource;
        $this->client = new Client(array_merge($defaults, $options));
        $this->inflector = InflectorFactory::create()->build();
    }

    /**
     * @return Request
     */
    protected function prepare(): Request
    {
        return new Request($this->method, $this->resource);
    }

    /**
     * @param ResponseInterface $response
     *
     * @return stdClass
     */
    protected function getResponseData(ResponseInterface $response): stdClass
    {
        return json_decode($response->getBody()->getContents());
    }

    /**
     * @param stdClass $response
     *
     * @return array
     */
    protected function transformAll(stdClass $response): array
    {
        return $response->data;
    }

    /**
     * @return array
     * @throws GuzzleException
     */
    public function all(): array
    {
        $response = $this->getResponseData($this->client->send($this->prepare()));

        return $this->transformAll($response);
    }
}