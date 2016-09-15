<?php

namespace Pokemon;

use Pokemon\Resources\Interfaces\QueriableResourceInterface;
use Pokemon\Resources\Interfaces\ResourceInterface;
use Pokemon\Resources\JsonResource;
use Pokemon\Resources\QueriableResource;

/**
 * Class Pokemon
 *
 * @package Pokemon
 */
class Pokemon
{

    const API_URL = 'https://api.pokemontcg.io/v1/';

    /**
     * @param array $options
     *
     * @return QueriableResourceInterface
     */
    public static function Card(array $options = [])
    {
        return new QueriableResource('cards', $options);
    }

    /**
     * @param array $options
     *
     * @return QueriableResourceInterface
     */
    public static function Set(array $options = [])
    {
        return new QueriableResource('sets', $options);
    }

    /**
     * @param array $options
     *
     * @return ResourceInterface
     */
    public static function Type(array $options = [])
    {
        return new JsonResource('types', $options);
    }

    /**
     * @param array $options
     *
     * @return ResourceInterface
     */
    public static function Supertype(array $options = [])
    {
        return new JsonResource('supertypes', $options);
    }

    /**
     * @param array $options
     *
     * @return ResourceInterface
     */
    public static function Subtype(array $options = [])
    {
        return new JsonResource('subtypes', $options);
    }
}