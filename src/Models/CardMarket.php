<?php

namespace Pokemon\Models;

/**
 * Class CardMarket
 *
 * @package Pokemon\Models
 */
class CardMarket extends Model
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
     * @var CardMarketPrices|null
     */
    private $cardMarketPrices;

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
     * @return CardMarketPrices|null
     */
    public function getPrices(): ?CardMarketPrices
    {
        return $this->cardMarketPrices;
    }

    /**
     * @param CardMarketPrices|null $cardMarketPrices
     */
    public function setPrices(?CardMarketPrices $cardMarketPrices)
    {
        $this->cardMarketPrices = $cardMarketPrices;
    }

}