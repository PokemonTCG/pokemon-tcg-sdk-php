<?php

namespace Pokemon\Resources;

use Doctrine\Inflector\Inflector;
use Doctrine\Inflector\InflectorFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use Pokemon\Models\Model;
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
     * @param array  $options
     */
    public function __construct($resource, array $options = [])
    {
        $defaults = [
            'base_uri' => Pokemon::API_URL,
            'verify'   => false,
        ];
        $this->resource = $resource;
        $this->client = new Client(array_merge($defaults, $options));
        $this->inflector = InflectorFactory::create()->build();
    }

    /**
     * @return Request
     */
    protected function prepare()
    {
        return new Request($this->method, $this->resource);
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
     * @param stdClass $data
     *
     * @return Model|null
     */
    protected function transform(stdClass $data)
    {
        $model = null;

        $class = '\\Pokemon\\Models\\' . ucfirst($this->inflector->singularize($this->resource));
        if (class_exists($class)) {
            /** @var Model $model */
            $model = new $class;
            $model->fill($data);
        }

        return $model;
    }

    /**
     * @return array
     * @throws GuzzleException
     */
    public function all()
    {
        $data = $this->getResponseData($this->client->send($this->prepare()));

        return $this->transformAll($data);
    }
}