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
     * @var string|null
     */
    private $small;

    /**
     * @var string|null
     */
    private $large;

    /**
     * @return string|null
     */
    public function getSmall(): ?string
    {
        return $this->small;
    }

    /**
     * @param string|null $small
     */
    public function setSmall(?string $small)
    {
        $this->small = $small;
    }

    /**
     * @return string|null
     */
    public function getLarge(): ?string
    {
        return $this->large;
    }

    /**
     * @param string|null $large
     */
    public function setLarge(?string $large)
    {
        $this->large = $large;
    }

}