<?php

namespace Pokemon\Resources;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;
use Pokemon\Models\Model;
use Pokemon\Models\Pagination;
use Pokemon\Pokemon;
use Pokemon\Resources\Interfaces\QueriableResourceInterface;
use stdClass;

/**
 * Class QueryableResource
 *
 * @package Pokemon\Resources
 */
class QueryableResource extends JsonResource implements QueriableResourceInterface
{

    const DEFAULT_PAGE = 1;
    const DEFAULT_PAGE_SIZE = 250;

    /**
     * @var array
     */
    protected $query = [];

    /**
     * @var int
     */
    protected $page = self::DEFAULT_PAGE;

    /**
     * @var int
     */
    protected $pageSize = self::DEFAULT_PAGE_SIZE;

    /**
     * @var array
     */
    protected $orderBy = [];

    /**
     * @var string|null
     */
    protected $identifier;

    /**
     * @return Request
     */
    protected function prepare(): Request
    {
        $uri = $this->resource;

        if (!empty($this->identifier)) {
            $uri = $uri . '/' . $this->identifier;
            $this->identifier = null;

            return new Request($this->method, $uri);
        }

        $queryParams = [];
        if (!empty($this->query)) {
            $query = array_map(function ($attribute, $value) {
                return $attribute . ':"' . $value . '"';
            }, array_keys($this->query), $this->query);

            $queryParams['q'] = implode(' ', $query);
            $this->query = [];
        }

        if ($this->page > self::DEFAULT_PAGE) {
            $queryParams['page'] = $this->page;
            $this->page = self::DEFAULT_PAGE;
        }

        if ($this->pageSize !== self::DEFAULT_PAGE_SIZE) {
            $queryParams['pageSize'] = $this->pageSize;
            $this->pageSize = self::DEFAULT_PAGE_SIZE;
        }

        if (!empty($this->orderBy)) {
            $queryParams['orderBy'] = implode(',', $this->orderBy);
            $this->orderBy = [];
        }

        $uri = $this->resource . '?' . http_build_query($queryParams);
        return new Request($this->method, $uri);
    }

    /**
     * @param array $query
     * @return QueriableResourceInterface
     */
    public function where(array $query): QueriableResourceInterface
    {
        $this->query = array_merge($this->query, $query);

        return $this;
    }

    /**
     * @param int $page
     * @return QueriableResourceInterface
     */
    public function page(int $page): QueriableResourceInterface
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @param int $pageSize
     * @return QueriableResourceInterface
     */
    public function pageSize(int $pageSize): QueriableResourceInterface
    {
        $this->pageSize = $pageSize;

        return $this;
    }

    /**
     * @param string $attribute
     * @param int $direction
     * @return QueriableResourceInterface
     */
    public function orderBy(string $attribute, int $direction = Pokemon::ASCENDING_ORDER): QueriableResourceInterface
    {
        $this->orderBy[] = $direction === Pokemon::DESCENDING_ORDER ? '-' . $attribute : $attribute;

        return $this;
    }

    /**
     * @param stdClass $data
     * @return Model|null
     */
    protected function transform(stdClass $data): ?Model
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
     * @param stdClass $response
     * @return array
     */
    protected function transformAll(stdClass $response): array
    {
        return array_map(function ($data) {
            return $this->transform($data);
        }, $response->data);
    }

    /**
     * @param string $identifier
     * @return Model|null
     * @throws InvalidArgumentException
     * @throws GuzzleException
     */
    public function find($identifier): ?Model
    {
        $this->identifier = $identifier;
        try {
            $response = $this->getResponseData($this->client->send($this->prepare()));
        } catch (ClientException $e) {
            throw new InvalidArgumentException('Card not found with identifier: ' . $identifier);
        }

        return $this->transform($response->data);
    }

    /**
     * @return Pagination
     * @throws GuzzleException
     */
    public function pagination(): Pagination
    {
        $response = $this->getResponseData($this->client->send($this->prepare()));

        $pagination = new Pagination();
        $pagination->setPage($response->page);
        $pagination->setPageSize($response->pageSize);
        $pagination->setCount($response->count);
        $pagination->setTotalCount($response->totalCount);

        return $pagination;
    }

}