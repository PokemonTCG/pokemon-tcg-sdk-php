<?php

namespace Pokemon\Resources;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;
use Pokemon\Models\Model;
use Pokemon\Resources\Interfaces\QueriableResourceInterface;
use stdClass;

/**
 * Class QueryableResource
 *
 * @package Pokemon\Resources
 */
class QueryableResource extends JsonResource implements QueriableResourceInterface
{

    /**
     * @var array
     */
    protected $query = [];

    /**
     * @var string|null
     */
    protected $identifier;

    /**
     * @return Request
     */
    protected function prepare()
    {
        $uri = $this->resource;

        if (!empty($this->identifier)) {
            $uri = $this->resource . '/' . $this->identifier;
            $this->identifier = null;
        }

        if (!empty($this->query)) {
            $uri = $this->resource . '?' . http_build_query($this->query);
            $this->query = [];
        }

        return new Request($this->method, $uri);
    }

    /**
     * @param array $query
     *
     * @return QueriableResourceInterface
     */
    public function where(array $query)
    {
        $this->query = array_merge($this->query, $query);

        return $this;
    }

    /**
     * @param stdClass $data
     *
     * @return array
     */
    protected function transformAll(stdClass $data)
    {
        return array_map(function ($data) {
            return $this->transform($data);
        }, $this->getFirstProperty($data));
    }

    /**
     * @param string $identifier
     *
     * @return Model|null
     * @throws InvalidArgumentException
     * @throws GuzzleException
     */
    public function find($identifier)
    {
        $this->identifier = $identifier;
        try {
            $response = $this->getResponseData($this->client->send($this->prepare()));
        } catch (ClientException $e) {
            throw new InvalidArgumentException('Card not found with identifier: ' . $identifier);
        }

        return $this->transform($response->data);
    }

}