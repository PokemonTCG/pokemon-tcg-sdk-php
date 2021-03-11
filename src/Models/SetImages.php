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
     * @var string
     */
    private $symbol;

    /**
     * @var string
     */
    private $logo;

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol(string $symbol)
    {
        $this->symbol = $symbol;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo(string $logo)
    {
        $this->logo = $logo;
    }

}