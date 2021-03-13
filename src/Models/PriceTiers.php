<?php

namespace Pokemon\Models;

/**
 * class PriceTiers
 *
 * @package Pokemon\Models
 */
class PriceTiers extends Model
{

    /**
     * @var float|null
     */
    private $low;

    /**
     * @var float|null
     */
    private $mid;

    /**
     * @var float|null
     */
    private $high;

    /**
     * @var float|null
     */
    private $market;

    /**
     * @var float|null
     */
    private $directLow;

    /**
     * @return float|null
     */
    public function getLow(): ?float
    {
        return $this->low;
    }

    /**
     * @param float|null $low
     */
    public function setLow(?float $low)
    {
        $this->low = $low;
    }

    /**
     * @return float|null
     */
    public function getMid(): ?float
    {
        return $this->mid;
    }

    /**
     * @param float|null $mid
     */
    public function setMid(?float $mid)
    {
        $this->mid = $mid;
    }

    /**
     * @return float|null
     */
    public function getHigh(): ?float
    {
        return $this->high;
    }

    /**
     * @param float|null $high
     */
    public function setHigh(?float $high)
    {
        $this->high = $high;
    }

    /**
     * @return float|null
     */
    public function getMarket(): ?float
    {
        return $this->market;
    }

    /**
     * @param float|null $market
     */
    public function setMarket(?float $market)
    {
        $this->market = $market;
    }

    /**
     * @return float|null
     */
    public function getDirectLow(): ?float
    {
        return $this->directLow;
    }

    /**
     * @param float|null $directLow
     */
    public function setDirectLow(?float $directLow)
    {
        $this->directLow = $directLow;
    }

}