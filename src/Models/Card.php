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
    private $imageUrlHiRes;

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
     * @var array
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
        return (string)$this->id;
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
     * @return int
     */
    public function getNationalPokedexNumber()
    {
        return (int)$this->nationalPokedexNumber;
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
        return (string)$this->imageUrl;
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
    public function getImageUrlHiRes()
    {
        return (string)$this->imageUrlHiRes;
    }

    /**
     * @param string $imageUrlHiRes
     */
    public function setImageUrlHiRes($imageUrlHiRes)
    {
        $this->imageUrlHiRes = $imageUrlHiRes;
    }

    /**
     * @return string
     */
    public function getSubtype()
    {
        return (string)$this->subtype;
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
        return (string)$this->supertype;
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
        return (string)$this->hp;
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
        return (array)$this->retreatCost;
    }

    /**
     * @param array $retreatCost
     */
    public function setRetreatCost($retreatCost)
    {
        $this->retreatCost = $retreatCost;
    }

    /**
     * @return array
     */
    public function getText()
    {
        return (array)$this->text;
    }

    /**
     * @param array $text
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
        return (string)$this->number;
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
        return (string)$this->artist;
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
        return (string)$this->rarity;
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
     * @return string
     */
    public function getSet()
    {
        return (string)$this->set;
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
        return (string)$this->setCode;
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
        return (array)$this->types;
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
        return (array)$this->attacks;
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
        return (array)$this->weaknesses;
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
        return (array)$this->resistances;
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