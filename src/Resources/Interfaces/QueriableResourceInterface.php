<?php

namespace Pokemon\Resources\Interfaces;

use Pokemon\Models\Model;

/**
 * Interface QueriableResourceInterface
 *
 * @package Pokemon\Resources\Interfaces
 */
interface QueriableResourceInterface extends ResourceInterface
{

    /**
     * @param array $query
     *
     * @return QueriableResourceInterface
     */
    public function where(array $query);

    /**
     * @param string $identifier
     *
     * @return Model|null
     */
    public function find($identifier);

}