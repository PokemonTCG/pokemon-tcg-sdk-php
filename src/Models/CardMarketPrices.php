<?php

namespace Pokemon\Models;

/**
 * Class CardMarketPrices
 *
 * @package Pokemon\Models
 */
class CardMarketPrices extends Model
{

    /** @var float|null */
    private $averageSellPrice;

    /** @var float|null */
    private $lowPrice;

    /** @var float|null */
    private $trendPrice;

    /** @var float|null */
    private $germanProLow;

    /** @var float|null */
    private $suggestedPrice;

    /** @var float|null */
    private $reverseHoloSell;

    /** @var float|null */
    private $reverseHoloLow;

    /** @var float|null */
    private $reverseHoloTrend;

    /** @var float|null */
    private $lowPriceExPlus;

    /** @var float|null */
    private $avg1;

    /** @var float|null */
    private $avg7;

    /** @var float|null */
    private $avg30;

    /** @var float|null */
    private $reverseHoloAvg1;

    /** @var float|null */
    private $reverseHoloAvg7;

    /** @var float|null */
    private $reverseHoloAvg30;

    /**
     * @return float|null
     */
    public function getAverageSellPrice(): ?float
    {
        return $this->averageSellPrice;
    }

    /**
     * @param  float|null  $averageSellPrice
     */
    public function setAverageSellPrice(?float $averageSellPrice): void
    {
        $this->averageSellPrice = $averageSellPrice;
    }

    /**
     * @return float|null
     */
    public function getLowPrice(): ?float
    {
        return $this->lowPrice;
    }

    /**
     * @param  float|null  $lowPrice
     */
    public function setLowPrice(?float $lowPrice): void
    {
        $this->lowPrice = $lowPrice;
    }

    /**
     * @return float|null
     */
    public function getTrendPrice(): ?float
    {
        return $this->trendPrice;
    }

    /**
     * @param  float|null  $trendPrice
     */
    public function setTrendPrice(?float $trendPrice): void
    {
        $this->trendPrice = $trendPrice;
    }

    /**
     * @return float|null
     */
    public function getReverseHoloTrend(): ?float
    {
        return $this->reverseHoloTrend;
    }

    /**
     * @param  float|null  $reverseHoloTrend
     */
    public function setReverseHoloTrend(?float $reverseHoloTrend): void
    {
        $this->reverseHoloTrend = $reverseHoloTrend;
    }

    /**
     * @return float|null
     */
    public function getGermanProLow(): ?float
    {
        return $this->germanProLow;
    }

    /**
     * @param  float|null  $germanProLow
     */
    public function setGermanProLow(?float $germanProLow): void
    {
        $this->germanProLow = $germanProLow;
    }

    /**
     * @return float|null
     */
    public function getReverseHoloSell(): ?float
    {
        return $this->reverseHoloSell;
    }

    /**
     * @param  float|null  $reverseHoloSell
     */
    public function setReverseHoloSell(?float $reverseHoloSell): void
    {
        $this->reverseHoloSell = $reverseHoloSell;
    }

    /**
     * @return float|null
     */
    public function getSuggestedPrice(): ?float
    {
        return $this->suggestedPrice;
    }

    /**
     * @param  float|null  $suggestedPrice
     */
    public function setSuggestedPrice(?float $suggestedPrice): void
    {
        $this->suggestedPrice = $suggestedPrice;
    }

    /**
     * @return float|null
     */
    public function getReverseHoloLow(): ?float
    {
        return $this->reverseHoloLow;
    }

    /**
     * @param  float|null  $reverseHoloLow
     */
    public function setReverseHoloLow(?float $reverseHoloLow): void
    {
        $this->reverseHoloLow = $reverseHoloLow;
    }

    /**
     * @return float|null
     */
    public function getLowPriceExPlus(): ?float
    {
        return $this->lowPriceExPlus;
    }

    /**
     * @param  float|null  $lowPriceExPlus
     */
    public function setLowPriceExPlus(?float $lowPriceExPlus): void
    {
        $this->lowPriceExPlus = $lowPriceExPlus;
    }

    /**
     * @return float|null
     */
    public function getReverseHoloAvg30(): ?float
    {
        return $this->reverseHoloAvg30;
    }

    /**
     * @param  float|null  $reverseHoloAvg30
     */
    public function setReverseHoloAvg30(?float $reverseHoloAvg30): void
    {
        $this->reverseHoloAvg30 = $reverseHoloAvg30;
    }

    /**
     * @return float|null
     */
    public function getAvg1(): ?float
    {
        return $this->avg1;
    }

    /**
     * @param  float|null  $avg1
     */
    public function setAvg1(?float $avg1): void
    {
        $this->avg1 = $avg1;
    }

    /**
     * @return float|null
     */
    public function getAvg7(): ?float
    {
        return $this->avg7;
    }

    /**
     * @param  float|null  $avg7
     */
    public function setAvg7(?float $avg7): void
    {
        $this->avg7 = $avg7;
    }

    /**
     * @return float|null
     */
    public function getAvg30(): ?float
    {
        return $this->avg30;
    }

    /**
     * @param  float|null  $avg30
     */
    public function setAvg30(?float $avg30): void
    {
        $this->avg30 = $avg30;
    }

    /**
     * @return float|null
     */
    public function getReverseHoloAvg1(): ?float
    {
        return $this->reverseHoloAvg1;
    }

    /**
     * @param  float|null  $reverseHoloAvg1
     */
    public function setReverseHoloAvg1(?float $reverseHoloAvg1): void
    {
        $this->reverseHoloAvg1 = $reverseHoloAvg1;
    }

    /**
     * @return float|null
     */
    public function getReverseHoloAvg7(): ?float
    {
        return $this->reverseHoloAvg7;
    }

    /**
     * @param  float|null  $reverseHoloAvg7
     */
    public function setReverseHoloAvg7(?float $reverseHoloAvg7): void
    {
        $this->reverseHoloAvg7 = $reverseHoloAvg7;
    }

}