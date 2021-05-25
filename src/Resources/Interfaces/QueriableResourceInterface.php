<?php

namespace Pokemon\Resources\Interfaces;

use Pokemon\Models\Model;
use Pokemon\Models\Pagination;
use Pokemon\Pokemon;

/**
 * Interface QueriableResourceInterface
 *
 * @package Pokemon\Resources\Interfaces
 */
interface QueriableResourceInterface extends ResourceInterface
{
    const DEFAULT_PAGE = 1;

    const DEFAULT_PAGE_SIZE = 250;

    /**
     * @param array $query
     * @return QueriableResourceInterface
     */
    public function where(array $query): QueriableResourceInterface;

    /**
     * @param int $page
     * @return QueriableResourceInterface
     */
    public function page(int $page): QueriableResourceInterface;

    /**
     * @param int $pageSize
     * @return QueriableResourceInterface
     */
    public function pageSize(int $pageSize): QueriableResourceInterface;

    /**
     * @param string $attribute
     * @param int $direction
     * @return QueriableResourceInterface
     */
    public function orderBy(string $attribute, int $direction = Pokemon::ASCENDING_ORDER): QueriableResourceInterface;

    /**
     * @param string $identifier
     * @return Model|null
     */
    public function find($identifier): ?Model;

    /**
     * @return Pagination
     */
    public function pagination(): Pagination;
}
