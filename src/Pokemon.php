<?php

namespace Pokemon;

use Pokemon\Resources\Interfaces\QueriableResourceInterface;
use Pokemon\Resources\Interfaces\ResourceInterface;
use Pokemon\Resources\JsonResource;
use Pokemon\Resources\QueryableResource;

/**
 * Class Pokemon
 *
 * @package Pokemon
 */
class Pokemon
{

    const API_URL = 'https://api.pokemontcg.io/v2/';

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
    public static function Card(array $options = []): QueriableResourceInterface
    {
        return self::getQueriableResource('cards', $options);
    }

    /**
     * @param array $options
     *
     * @return QueriableResourceInterface
     */
    public static function Set(array $options = []): QueriableResourceInterface
    {
        return self::getQueriableResource('sets', $options);
    }

    /**
     * @param array $options
     *
     * @return ResourceInterface
     */
    public static function Type(array $options = []): ResourceInterface
    {
        return self::getJsonResource('types', $options);
    }

    /**
     * @param array $options
     *
     * @return ResourceInterface
     */
    public static function Subtype(array $options = []): ResourceInterface
    {
        return self::getJsonResource('subtypes', $options);
    }

    /**
     * @param array $options
     *
     * @return ResourceInterface
     */
    public static function Supertype(array $options = []): ResourceInterface
    {
        return self::getJsonResource('supertypes', $options);
    }

    /**
     * @param array $options
     *
     * @return ResourceInterface
     */
    public static function Rarity(array $options = []): ResourceInterface
    {
        return self::getJsonResource('rarities', $options);
    }

    /**
     * @param string $type
     * @param array  $options
     *
     * @return QueriableResourceInterface
     */
    private static function getQueriableResource($type, array $options = []): QueriableResourceInterface
    {
        if (!array_key_exists($type, self::$cache['resources']) || self::haveOptionsBeenUpdated($type, $options)) {
            self::$cache['options'][$type] = $options;
            self::$cache['resources'][$type] = new QueryableResource($type, $options);
        }
        return self::$cache['resources'][$type];
    }

    /**
     * @param string $type
     * @param array  $options
     *
     * @return ResourceInterface
     */
    private static function getJsonResource($type, array $options = []): ResourceInterface
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
    private static function haveOptionsBeenUpdated($key, array $options = []): bool
    {
        if (array_key_exists($key, self::$cache)) {
            return (self::$cache[$key] != $options);
        }
        return false;
    }
}