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
     * @var Legalities|null
     */
    private $legalities;

    /**
     * @var string|null
     */
    private $ptcgoCode;

    /**
     * @var string|null
     */
    private $releaseDate;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @var SetImages|null
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
     * @return Legalities|null
     */
    public function getLegalities(): ?Legalities
    {
        return $this->legalities;
    }

    /**
     * @param Legalities|null $legalities
     */
    public function setLegalities(?Legalities $legalities)
    {
        $this->legalities = $legalities;
    }

    /**
     * @return string|null
     */
    public function getPtcgoCode(): ?string
    {
        return $this->ptcgoCode;
    }

    /**
     * @param string|null $ptcgoCode
     */
    public function setPtcgoCode(?string $ptcgoCode)
    {
        $this->ptcgoCode = $ptcgoCode;
    }

    /**
     * @return string|null
     */
    public function getReleaseDate(): ?string
    {
        return $this->releaseDate;
    }

    /**
     * @param string|null $releaseDate
     */
    public function setReleaseDate(?string $releaseDate)
    {
        $this->releaseDate = $releaseDate;
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
     * @return SetImages|null
     */
    public function getImages(): ?SetImages
    {
        return $this->images;
    }

    /**
     * @param SetImages|null $images
     */
    public function setImages(?SetImages $images)
    {
        $this->images = $images;
    }

}