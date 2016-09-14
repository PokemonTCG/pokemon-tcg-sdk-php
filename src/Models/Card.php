<?php

namespace Pokemon\Models;

/**
 * Class Card
 *
 * @package Pokemon\Models
 */
class Card extends Model
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
     * @var int
     */
    private $nationalPokedexNumber;

    /**
     * @var string
     */
    private $imageUrl;

    /**
     * @var string
     */
    private $subtype;

    /**
     * @var string
     */
    private $supertype;

    /**
     * @var Ability
     */
    private $ability;

    /**
     * @var string
     */
    private $hp;

    /**
     * @var array
     */
    private $retreatCost;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $artist;

    /**
     * @var string
     */
    private $rarity;

    /**
     * @var string
     */
    private $series;

    /**
     * @var string
     */
    private $set;

    /**
     * @var string
     */
    private $setCode;

    /**
     * @var array
     */
    private $types;

    /**
     * @var array
     */
    private $attacks;

    /**
     * @var array
     */
    private $weaknesses;

    /**
     * @var array
     */
    private $resistances;

    /**
     * @var AncientTrait
     */
    private $ancientTrait;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return int
     */
    public function getNationalPokedexNumber()
    {
        return $this->nationalPokedexNumber;
    }

    /**
     * @param int $nationalPokedexNumber
     */
    public function setNationalPokedexNumber($nationalPokedexNumber)
    {
        $this->nationalPokedexNumber = $nationalPokedexNumber;
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @param string $imageUrl
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * @return string
     */
    public function getSubtype()
    {
        return $this->subtype;
    }

    /**
     * @param string $subtype
     */
    public function setSubtype($subtype)
    {
        $this->subtype = $subtype;
    }

    /**
     * @return string
     */
    public function getSupertype()
    {
        return $this->supertype;
    }

    /**
     * @param string $supertype
     */
    public function setSupertype($supertype)
    {
        $this->supertype = $supertype;
    }

    /**
     * @return Ability
     */
    public function getAbility()
    {
        return $this->ability;
    }

    /**
     * @param Ability $ability
     */
    public function setAbility($ability)
    {
        $this->ability = $ability;
    }

    /**
     * @return string
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * @param string $hp
     */
    public function setHp($hp)
    {
        $this->hp = $hp;
    }

    /**
     * @return array
     */
    public function getRetreatCost()
    {
        return $this->retreatCost;
    }

    /**
     * @param array $retreatCost
     */
    public function setRetreatCost($retreatCost)
    {
        $this->retreatCost = $retreatCost;
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
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @param string $artist
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;
    }

    /**
     * @return string
     */
    public function getRarity()
    {
        return $this->rarity;
    }

    /**
     * @param string $rarity
     */
    public function setRarity($rarity)
    {
        $this->rarity = $rarity;
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
     * @return string
     */
    public function getSet()
    {
        return $this->set;
    }

    /**
     * @param string $set
     */
    public function setSet($set)
    {
        $this->set = $set;
    }

    /**
     * @return string
     */
    public function getSetCode()
    {
        return $this->setCode;
    }

    /**
     * @param string $setCode
     */
    public function setSetCode($setCode)
    {
        $this->setCode = $setCode;
    }

    /**
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @param array $types
     */
    public function setTypes($types)
    {
        $this->types = $types;
    }

    /**
     * @return array
     */
    public function getAttacks()
    {
        return $this->attacks;
    }

    /**
     * @param array $attacks
     */
    public function setAttacks($attacks)
    {
        $this->attacks = $attacks;
    }

    /**
     * @return array
     */
    public function getWeaknesses()
    {
        return $this->weaknesses;
    }

    /**
     * @param array $weaknesses
     */
    public function setWeaknesses($weaknesses)
    {
        $this->weaknesses = $weaknesses;
    }

    /**
     * @return array
     */
    public function getResistances()
    {
        return $this->resistances;
    }

    /**
     * @param array $resistances
     */
    public function setResistances($resistances)
    {
        $this->resistances = $resistances;
    }

    /**
     * @return AncientTrait
     */
    public function getAncientTrait()
    {
        return $this->ancientTrait;
    }

    /**
     * @param AncientTrait $ancientTrait
     */
    public function setAncientTrait(AncientTrait $ancientTrait)
    {
        $this->ancientTrait = $ancientTrait;
    }
}