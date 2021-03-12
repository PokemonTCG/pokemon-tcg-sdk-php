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
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $cost;

    /**
     * @var int
     */
    private $convertedEnergyCost;

    /**
     * @var string|null
     */
    private $damage;

    /**
     * @var string|null
     */
    private $text;

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
     * @return array
     */
    public function getCost(): array
    {
        return $this->cost;
    }

    /**
     * @param array $cost
     */
    public function setCost(array $cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return int
     */
    public function getConvertedEnergyCost(): int
    {
        return $this->convertedEnergyCost;
    }

    /**
     * @param int $convertedEnergyCost
     */
    public function setConvertedEnergyCost(int $convertedEnergyCost)
    {
        $this->convertedEnergyCost = $convertedEnergyCost;
    }

    /**
     * @return string|null
     */
    public function getDamage(): ?string
    {
        return $this->damage;
    }

    /**
     * @param string|null $damage
     */
    public function setDamage(?string $damage)
    {
        $this->damage = $damage;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     */
    public function setText(?string $text)
    {
        $this->text = $text;
    }

}