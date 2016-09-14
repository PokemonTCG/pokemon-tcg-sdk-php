<?php

namespace Pokemon;

use Pokemon\Resources\ArrayDataResource;
use Pokemon\Resources\CardResource;
use Pokemon\Resources\Interfaces\QueriableResourceInterface;
use Pokemon\Resources\Interfaces\ResourceInterface;
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
     * @return QueriableResourceInterface
     */
    public static function Card()
    {
        return new CardResource('cards');
    }

    /**
     * @return QueriableResourceInterface
     */
    public static function Set()
    {
        return new QueriableResource('sets');
    }

    /**
     * @return ResourceInterface
     */
    public static function Type()
    {
        return new ArrayDataResource('types');
    }

    /**
     * @return ResourceInterface
     */
    public static function Supertype()
    {
        return new ArrayDataResource('supertypes');
    }

    /**
     * @return ResourceInterface
     */
    public static function Subtype()
    {
        return new ArrayDataResource('subtypes');
    }
}