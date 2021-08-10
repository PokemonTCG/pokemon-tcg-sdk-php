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
     * @return CardMarketPrices|null
     */
    public function getPrices(): ?CardMarketPrices
    {
        return $this->prices;
    }

    /**
     * @param CardMarketPrices|null $prices
     */
    public function setPrices(?CardMarketPrices $prices)
    {
        $this->prices= $prices;
    }

    /**
     * @param string $attribute
     * @param mixed $value
     *
     * @return mixed|Model
     */
    protected function parse($attribute, $value)
    {
        if (is_object($value)) {
            switch ($attribute) {
                case 'prices':
                    $class = '\\Pokemon\\Models\\CardMarketPrices';
                    break;
            }

            if (class_exists($class)) {
                /** @var Model $model */
                $model = new $class;
                $model->fill($value);
                $value = $model;
            }
        }

        return $value;
    }

}
