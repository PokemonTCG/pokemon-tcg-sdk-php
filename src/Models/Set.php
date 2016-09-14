<?php

namespace Pokemon\Models;

/**
 * Class Set
 *
 * @package Pokemon\Models
 */
class Set extends Model
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $series;

    /**
     * @var int
     */
    private $totalCards;

    /**
     * @var boolean
     */
    private $standardLegal;

    /**
     * @var string
     */
    private $releaseDate;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @param string $series
     */
    public function setSeries($series)
    {
        $this->series = $series;
    }

    /**
     * @return int
     */
    public function getTotalCards()
    {
        return $this->totalCards;
    }

    /**
     * @param int $totalCards
     */
    public function setTotalCards($totalCards)
    {
        $this->totalCards = $totalCards;
    }

    /**
     * @return boolean
     */
    public function isStandardLegal()
    {
        return $this->standardLegal;
    }

    /**
     * @param boolean $standardLegal
     */
    public function setStandardLegal($standardLegal)
    {
        $this->standardLegal = $standardLegal;
    }

    /**
     * @return string
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * @param string $releaseDate
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

}