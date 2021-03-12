<?php

namespace Pokemon\Models;

/**
 * Class Legalities
 *
 * @package Pokemon\Models
 */
class Legalities extends Model
{

    /**
     * @var string|null
     */
    private $standard;

    /**
     * @var string|null
     */
    private $unlimited;

    /**
     * @var string|null
     */
    private $expanded;

    /**
     * @return string|null
     */
    public function getStandard(): ?string
    {
        return $this->standard;
    }

    /**
     * @param string|null $standard
     */
    public function setStandard(?string $standard)
    {
        $this->standard = $standard;
    }

    /**
     * @return string|null
     */
    public function getUnlimited(): ?string
    {
        return $this->unlimited;
    }

    /**
     * @param string|null $unlimited
     */
    public function setUnlimited(?string $unlimited)
    {
        $this->unlimited = $unlimited;
    }

    /**
     * @return string|null
     */
    public function getExpanded(): ?string
    {
        return $this->expanded;
    }

    /**
     * @param string|null $expanded
     */
    public function setExpanded(?string $expanded)
    {
        $this->expanded = $expanded;
    }

}