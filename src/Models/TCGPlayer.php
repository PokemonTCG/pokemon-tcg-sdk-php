<?php

namespace Pokemon\Models;

/**
 * Class TCGPlayer
 *
 * @package Pokemon\Models
 */
class TCGPlayer extends Model
{

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $updatedAt;

    /**
     * @var array
     */
    private $prices;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * @param string $updatedAt
     */
    public function setUpdatedAt(string $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

//    /**
//     * @return array
//     */
//    public function getPrices(): array
//    {
//        return $this->prices;
//    }
//
//    /**
//     * @param array $prices
//     */
//    public function setPrices(array $prices)
//    {
//        $this->prices = $prices;
//    }

}