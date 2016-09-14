<?php

namespace Pokemon\Resources\Interfaces;

/**
 * Interface QueriableResourceInterface
 *
 * @package Pokemon\Resources\Interfaces
 */
interface QueriableResourceInterface extends ResourceInterface
{
    /**
     * @param string $parameter
     * @param string $value
     *
     * @return QueriableResourceInterface
     */
    public function where($parameter, $value);

    /**
     * @param string $identifier
     *
     * @return mixed
     */
    public function find($identifier);
    
}