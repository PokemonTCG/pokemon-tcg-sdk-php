<?php

namespace Pokemon\Models;

/**
 * Class CardImages
 *
 * @package Pokemon\Models
 */
class CardImages extends Model
{

    /**
     * @var string
     */
    private $small;

    /**
     * @var string
     */
    private $large;

    /**
     * @return string
     */
    public function getSmall(): string
    {
        return $this->small;
    }

    /**
     * @param string $small
     */
    public function setSmall(string $small)
    {
        $this->small = $small;
    }

    /**
     * @return string
     */
    public function getLarge(): string
    {
        return $this->large;
    }

    /**
     * @param string $large
     */
    public function setLarge(string $large)
    {
        $this->large = $large;
    }

}