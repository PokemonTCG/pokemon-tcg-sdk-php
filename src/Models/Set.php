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
    private $id;

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
    private $printedTotal;

    /**
     * @var int
     */
    private $total;

    /**
     * @var Legalities
     */
    private $legalities;

    /**
     * @var string
     */
    private $ptcgoCode;

    /**
     * @var string
     */
    private $releaseDate;

    /**
     * @var string
     */
    private $updatedAt;

    /**
     * @var SetImages
     */
    private $images;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSeries(): string
    {
        return $this->series;
    }

    /**
     * @param string $series
     */
    public function setSeries(string $series)
    {
        $this->series = $series;
    }

    /**
     * @return int
     */
    public function getPrintedTotal(): int
    {
        return $this->printedTotal;
    }

    /**
     * @param int $printedTotal
     */
    public function setPrintedTotal(int $printedTotal)
    {
        $this->printedTotal = $printedTotal;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal(int $total)
    {
        $this->total = $total;
    }

    /**
     * @return Legalities
     */
    public function getLegalities(): Legalities
    {
        return $this->legalities;
    }

    /**
     * @param Legalities $legalities
     */
    public function setLegalities(Legalities $legalities)
    {
        $this->legalities = $legalities;
    }

    /**
     * @return string
     */
    public function getPtcgoCode(): string
    {
        return $this->ptcgoCode;
    }

    /**
     * @param string $ptcgoCode
     */
    public function setPtcgoCode(string $ptcgoCode)
    {
        $this->ptcgoCode = $ptcgoCode;
    }

    /**
     * @return string
     */
    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }

    /**
     * @param string $releaseDate
     */
    public function setReleaseDate(string $releaseDate)
    {
        $this->releaseDate = $releaseDate;
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

    /**
     * @return SetImages
     */
    public function getImages(): SetImages
    {
        return $this->images;
    }

    /**
     * @param SetImages $images
     */
    public function setImages(SetImages $images)
    {
        $this->images = $images;
    }

}