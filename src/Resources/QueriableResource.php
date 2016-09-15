<?php

namespace Pokemon\Resources;

use Doctrine\Common\Inflector\Inflector;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;
use Pokemon\Models\Model;
use Pokemon\Resources\Interfaces\QueriableResourceInterface;
use stdClass;

/**
 * Class QueriableResource
 *
 * @package Pokemon\Resources
 */
class QueriableResource extends JsonResource implements QueriableResourceInterface
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
        $name = $this->getFirstPropertyName($data);

        return array_map(function ($data) use ($name) {
            return $this->transform($data, $name);
        }, $this->getFirstProperty($data));
    }

    /**
     * @param stdClass    $data
     * @param string|null $className
     *
     * @return Model|null
     */
    protected function transform(stdClass $data, $className = null)
    {
        $model = null;
        $name = !empty($className) ? $className : $this->getFirstPropertyName($data);
        $data = !empty($className) ? $data : $this->getFirstProperty($data);
        $class = '\\Pokemon\\Models\\' . ucfirst(Inflector::singularize($name));
        if (class_exists($class)) {
            /** @var Model $model */
            $model = new $class;
            $model->fill($data);
        }

        return $model;
    }

    /**
     * @param string $identifier
     *
     * @return Model|null
     * @throws InvalidArgumentException
     */
    public function find($identifier)
    {
        $this->identifier = $identifier;
        try {
            $data = $this->getResponseData($this->client->send($this->prepare()));
        } catch (ClientException $e) {
            throw new InvalidArgumentException('Card not found with identifier: ' . $identifier);
        }
        return $this->transform($data);
    }

}