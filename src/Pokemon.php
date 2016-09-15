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
     * @var null|array
     */
    private static $cache = [
        'resources' => [],
        'options'   => [],
    ];

    /**
     * @param array $options
     *
     * @return QueriableResourceInterface
     */
    public static function Card(array $options = [])
    {
        return self::getQueriableResource('cards', $options);
    }

    /**
     * @param array $options
     *
     * @return QueriableResourceInterface
     */
    public static function Set(array $options = [])
    {
        return self::getQueriableResource('sets', $options);
    }

    /**
     * @param array $options
     *
     * @return ResourceInterface
     */
    public static function Type(array $options = [])
    {
        return self::getJsonResource('types', $options);
    }

    /**
     * @param array $options
     *
     * @return ResourceInterface
     */
    public static function Supertype(array $options = [])
    {
        return self::getJsonResource('supertypes', $options);
    }

    /**
     * @param array $options
     *
     * @return ResourceInterface
     */
    public static function Subtype(array $options = [])
    {
        return self::getJsonResource('subtypes', $options);
    }

    /**
     * @param string $type
     * @param array  $options
     *
     * @return QueriableResourceInterface
     */
    private static function getQueriableResource($type, array $options = [])
    {
        if (!array_key_exists($type, self::$cache['resources']) || self::haveOptionsBeenUpdated($type, $options)) {
            self::$cache['options'][$type] = $options;
            self::$cache['resources'][$type] = new QueriableResource($type, $options);
        }
        return self::$cache['resources'][$type];
    }

    /**
     * @param string $type
     * @param array  $options
     *
     * @return ResourceInterface
     */
    private static function getJsonResource($type, array $options = [])
    {
        if (!array_key_exists($type, self::$cache['resources']) || self::haveOptionsBeenUpdated($type, $options)) {
            self::$cache['options'][$type] = $options;
            self::$cache['resources'][$type] = new JsonResource($type, $options);
        }
        return self::$cache['resources'][$type];
    }

    /**
     * @param string $key
     * @param array  $options
     *
     * @return bool
     */
    private static function haveOptionsBeenUpdated($key, array $options = [])
    {
        if (array_key_exists($key, self::$cache)) {
            return (self::$cache[$key] != $options);
        }
        return false;
    }
}