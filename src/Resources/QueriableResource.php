<?php

namespace Pokemon\Resources;

use GuzzleHttp\Psr7\Request;
use Pokemon\Resources\Interfaces\QueriableResourceInterface;

/**
 * Class QueriableResource
 *
 * @package Pokemon\Resources
 */
class QueriableResource extends Resource implements QueriableResourceInterface
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
        $uri = $this->uri;

        if (!empty($this->identifier)) {
            $uri = $this->uri . '/' . $this->identifier;
            $this->identifier = null;
        }

        if (!empty($this->query)) {
            $uri = $this->uri . '?' . http_build_query($this->query);
            $this->query = [];
        }
        return new Request($this->method, $uri);
    }

    /**
     * @param string $parameter
     * @param string $value
     *
     * @return QueriableResourceInterface
     */
    public function where($parameter, $value)
    {
        $this->query = array_merge($this->query, [$parameter, $value]);
        return $this;
    }

    /**
     * @param string $identifier
     *
     * @return mixed
     */
    public function find($identifier)
    {
        $this->identifier = $identifier;
        return $this->parseResponse($this->client->send($this->prepare()));
    }

}