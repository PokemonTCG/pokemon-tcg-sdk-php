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
    private $ptcgoCode;

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
     * @var boolean
     */
    private $expandedLegal;

    /**
     * @var string
     */
    private $releaseDate;

    /**
     * @var string
     */
    private $symbolUrl;

    /**
     * @var string
     */
    private $logoUrl;

    /**
     * @return string
     */
    public function getCode()
    {
        return (string)$this->code;
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
    public function getPtcgoCode()
    {
        return (string)$this->ptcgoCode;
    }

    /**
     * @param string $ptcgoCode
     */
    public function setPtcgoCode($ptcgoCode)
    {
        $this->ptcgoCode = $ptcgoCode;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return (string)$this->name;
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
        return (string)$this->series;
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
        return (int)$this->totalCards;
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
        return (boolean)$this->standardLegal;
    }

    /**
     * @param boolean $standardLegal
     */
    public function setStandardLegal($standardLegal)
    {
        $this->standardLegal = $standardLegal;
    }

    /**
     * @return boolean
     */
    public function isExpandedLegal()
    {
        return (boolean)$this->expandedLegal;
    }

    /**
     * @param boolean $expandedLegal
     */
    public function setExpandedLegal($expandedLegal)
    {
        $this->expandedLegal = $expandedLegal;
    }

    /**
     * @return string
     */
    public function getReleaseDate()
    {
        return (string)$this->releaseDate;
    }

    /**
     * @param string $releaseDate
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @return string
     */
    public function getSymbolUrl()
    {
        return (string)$this->symbolUrl;
    }

    /**
     * @param string $symbolUrl
     */
    public function setSymbolUrl($symbolUrl)
    {
        $this->symbolUrl = $symbolUrl;
    }

    /**
     * @return string
     */
    public function getLogoUrl()
    {
        return (string)$this->logoUrl;
    }

    /**
     * @param string $logoUrl
     */
    public function setLogoUrl($logoUrl)
    {
        $this->logoUrl = $logoUrl;
    }

}