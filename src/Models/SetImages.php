<?php

namespace Pokemon\Models;

/**
 * Class SetImages
 *
 * @package Pokemon\Models
 */
class SetImages extends Model
{

    /**
     * @var string|null
     */
    private $symbol;

    /**
     * @var string|null
     */
    private $logo;

    /**
     * @return string|null
     */
    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    /**
     * @param string|null $symbol
     */
    public function setSymbol(?string $symbol)
    {
        $this->symbol = $symbol;
    }

    /**
     * @return string|null
     */
    public function getLogo(): ?string
    {
        return $this->logo;
    }

    /**
     * @param string|null $logo
     */
    public function setLogo(?string $logo)
    {
        $this->logo = $logo;
    }

}