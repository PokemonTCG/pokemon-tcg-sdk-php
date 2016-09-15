<?php

namespace Pokemon\Models;

/**
 * Class Attack
 *
 * @package Pokemon\Models
 */
class Attack extends Model
{
    /**
     * @var array
     */
    private $cost;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $damage;

    /**
     * @var int
     */
    private $convertedEnergyCost;

    /**
     * @return array
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param array $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
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
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * @param string $damage
     */
    public function setDamage($damage)
    {
        $this->damage = $damage;
    }

    /**
     * @return int
     */
    public function getConvertedEnergyCost()
    {
        return $this->convertedEnergyCost;
    }

    /**
     * @param int $convertedEnergyCost
     */
    public function setConvertedEnergyCost($convertedEnergyCost)
    {
        $this->convertedEnergyCost = $convertedEnergyCost;
    }

}