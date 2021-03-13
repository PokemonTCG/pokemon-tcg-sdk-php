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
     * @var string|null
     */
    private $updatedAt;

    /**
     * @var Prices|null
     */
    private $prices;

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     */
    public function setUrl(?string $url)
    {
        $this->url = $url;
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param string|null $updatedAt
     */
    public function setUpdatedAt(?string $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return Prices|null
     */
    public function getPrices(): ?Prices
    {
        return $this->prices;
    }

    /**
     * @param Prices|null $prices
     */
    public function setPrices(?Prices $prices)
    {
        $this->prices = $prices;
    }

}