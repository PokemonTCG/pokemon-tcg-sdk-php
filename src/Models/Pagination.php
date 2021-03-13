<?php

namespace Pokemon\Models;

use DivisionByZeroError;

/**
 * Class Pagination
 *
 * @package Pokemon\Models
 */
class Pagination
{

    /**
     * @var int|null
     */
    private $page;

    /**
     * @var int|null
     */
    private $pageSize;

    /**
     * @var int|null
     */
    private $count;

    /**
     * @var int|null
     */
    private $totalCount;

    /**
     * @return int|null
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int|null $page
     */
    public function setPage(int $page)
    {
        $this->page = $page;
    }

    /**
     * @return int|null
     */
    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    /**
     * @param int|null $pageSize
     */
    public function setPageSize(int $pageSize)
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return int|null
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int|null $count
     */
    public function setCount(int $count)
    {
        $this->count = $count;
    }

    /**
     * @return int|null
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    /**
     * @param int|null $totalCount
     */
    public function setTotalCount(int $totalCount)
    {
        $this->totalCount = $totalCount;
    }

    /**
     * @return int
     */
    public function getTotalPages(): int
    {
        try {
            return ceil($this->totalCount / $this->pageSize);
        } catch (DivisionByZeroError $e) {
            return 1;
        }
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'page' => $this->page,
            'pageSize' => $this->pageSize,
            'count' => $this->count,
            'totalCount' => $this->totalCount,
            'totalPages' => $this->getTotalPages(),
        ];
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

}