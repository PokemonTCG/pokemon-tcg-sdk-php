<?php

namespace Pokemon\Models;

/**
 * class Prices
 *
 * @package Pokemon\Models
 */
class Prices extends Model
{

    /**
     * @var PriceTiers|null
     */
    private $normal;

    /**
     * @var PriceTiers|null
     */
    private $holofoil;

    /**
     * @var PriceTiers|null
     */
    private $reverseHolofoil;

    /**
     * @var PriceTiers|null
     */
    private $firstEditionNormal;

    /**
     * @return PriceTiers|null
     */
    public function getNormal(): ?PriceTiers
    {
        return $this->normal;
    }

    /**
     * @param PriceTiers|null $normal
     */
    public function setNormal(?PriceTiers $normal)
    {
        $this->normal = $normal;
    }

    /**
     * @return PriceTiers|null
     */
    public function getHolofoil(): ?PriceTiers
    {
        return $this->holofoil;
    }

    /**
     * @param PriceTiers|null $holofoil
     */
    public function setHolofoil(?PriceTiers $holofoil)
    {
        $this->holofoil = $holofoil;
    }

    /**
     * @return PriceTiers|null
     */
    public function getReverseHolofoil(): ?PriceTiers
    {
        return $this->reverseHolofoil;
    }

    /**
     * @param PriceTiers|null $reverseHolofoil
     */
    public function setReverseHolofoil(?PriceTiers $reverseHolofoil)
    {
        $this->reverseHolofoil = $reverseHolofoil;
    }

    /**
     * @return PriceTiers|null
     */
    public function getFirstEditionNormal(): ?PriceTiers
    {
        return $this->firstEditionNormal;
    }

    /**
     * @param PriceTiers|null $firstEditionNormal
     */
    public function setFirstEditionNormal(?PriceTiers $firstEditionNormal)
    {
        $this->firstEditionNormal = $firstEditionNormal;
    }

    /**
     * @param string $attribute
     * @param mixed $value
     *
     * @return mixed|Model
     */
    protected function parse($attribute, $value)
    {
        $tiers = new PriceTiers();
        $tiers->fill($value);

        return $tiers;
    }

}