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

    const DESCENDING_ORDER = -1;
    const ASCENDING_ORDER = 1;

    /**
     * @var string|null
     */
    private static $apiKey = null;

    /**
     * @var array
     */
    private static $options = [];

    /**
     * @var null|array
     */
    private static $cache = [
        'resources' => [],
        'options' => [],
    ];

    /**
     * @param string|null $apiKey
     */
    public static function ApiKey(?string $apiKey)
    {
        self::$apiKey = $apiKey;
    }

    /**
     * @param array $options
     */
    public static function Options(array $options)
    {
        self::$options = $options;
    }

    /**
     * @return QueriableResourceInterface
     */
    public static function Card(): QueriableResourceInterface
    {
        return self::getQueriableResource('cards');
    }

    /**
     * @return QueriableResourceInterface
     */
    public static function Set(): QueriableResourceInterface
    {
        return self::getQueriableResource('sets');
    }

    /**
     * @return ResourceInterface
     */
    public static function Type(): ResourceInterface
    {
        return self::getJsonResource('types');
    }

    /**
     * @return ResourceInterface
     */
    public static function Subtype(): ResourceInterface
    {
        return self::getJsonResource('subtypes');
    }

    /**
     * @return ResourceInterface
     */
    public static function Supertype(): ResourceInterface
    {
        return self::getJsonResource('supertypes');
    }

    /**
     * @return ResourceInterface
     */
    public static function Rarity(): ResourceInterface
    {
        return self::getJsonResource('rarities');
    }

    /**
     * @param string $type
     * @return QueriableResourceInterface
     */
    private static function getQueriableResource($type): QueriableResourceInterface
    {
        if (!array_key_exists($type, self::$cache['resources']) || self::haveOptionsBeenUpdated($type, self::$options)) {
            self::$cache['options'][$type] = self::$options;
            self::$cache['resources'][$type] = new QueryableResource($type, self::$options, self::$apiKey);
        }
        return self::$cache['resources'][$type];
    }

    /**
     * @param string $type
     * @return ResourceInterface
     */
    private static function getJsonResource($type): ResourceInterface
    {
        if (!array_key_exists($type, self::$cache['resources']) || self::haveOptionsBeenUpdated($type, self::$options)) {
            self::$cache['options'][$type] = self::$options;
            self::$cache['resources'][$type] = new JsonResource($type, self::$options, self::$apiKey);
        }
        return self::$cache['resources'][$type];
    }

    /**
     * @param string $key
     * @param array $options
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