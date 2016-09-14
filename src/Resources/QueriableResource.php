<?php

namespace Pokemon\Resources;

use Doctrine\Common\Inflector\Inflector;
use GuzzleHttp\Psr7\Request;
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
     * @param string $parameter
     * @param string $value
     *
     * @return QueriableResourceInterface
     */
    public function where($parameter, $value)
    {
        $this->query = array_merge($this->query, [$parameter => $value]);
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
     * @param stdClass $data
     *
     * @return Model|null
     */
    protected function transform(stdClass $data, $className = null)
    {
        $data = !empty($className) ? $data : $this->getFirstProperty($data);
        $name = !empty($className) ? $className : $this->getFirstPropertyName($data);
        $class = '\\Pokemon\\Models\\' . ucfirst(Inflector::singularize($name));
        if (class_exists($class)) {
            /** @var Model $model */
            $model = new $class;
            $model->fill($data);
            return $model;
        }

        return null;
    }

    /**
     * @param string $identifier
     *
     * @return Model|null
     */
    public function find($identifier)
    {
        $this->identifier = $identifier;
        $data = $this->getResponseData($this->client->send($this->prepare()));
        return $this->transform($data);
    }

}