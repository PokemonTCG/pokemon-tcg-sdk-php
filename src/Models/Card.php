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
     * @var string|null
     */
    private $supertype;

    /**
     * @var array|null
     */
    private $subtypes;

    /**
     * @var string|null
     */
    private $hp;

    /**
     * @var array|null
     */
    private $types;

    /**
     * @var array|null
     */
    private $rules;

    /**
     * @var string|null
     */
    private $evolvesFrom;

    /**
     * @var array|null
     */
    private $evolvesTo;

    /**
     * @var array|null
     */
    private $abilities;

    /**
     * @var array|null
     */
    private $attacks;

    /**
     * @var array|null
     */
    private $weaknesses;

    /**
     * @var array|null
     */
    private $resistances;

    /**
     * @var array|null
     */
    private $retreatCost;

    /**
     * @var int|null
     */
    private $convertedRetreatCost;

    /**
     * @var Set
     */
    private $set;

    /**
     * @var string|null
     */
    private $number;

    /**
     * @var string|null
     */
    private $artist;

    /**
     * @var string|null
     */
    private $rarity;

    /**
     * @var string|null
     */
    private $flavorText;

    /**
     * @var array|null
     */
    private $nationalPokedexNumbers;

    /**
     * @var Legalities|null
     */
    private $legalities;

    /**
     * @var CardImages|null
     */
    private $images;

    /**
     * @var AncientTrait|null
     */
    private $ancientTrait;

    /**
     * @var TCGPlayer|null
     */
    private $tcgplayer;

    /**
     * @var CardMarket|null
     */
    private $cardmarket;

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
     * @return string|null
     */
    public function getSupertype(): ?string
    {
        return $this->supertype;
    }

    /**
     * @param string|null $supertype
     */
    public function setSupertype(?string $supertype)
    {
        $this->supertype = $supertype;
    }

    /**
     * @return array|null
     */
    public function getSubtypes(): ?array
    {
        return $this->subtypes;
    }

    /**
     * @param array|null $subtypes
     */
    public function setSubtypes(?array $subtypes)
    {
        $this->subtypes = $subtypes;
    }

    /**
     * @return string|null
     */
    public function getHp(): ?string
    {
        return $this->hp;
    }

    /**
     * @param string|null $hp
     */
    public function setHp(?string $hp)
    {
        $this->hp = $hp;
    }

    /**
     * @return array|null
     */
    public function getTypes(): ?array
    {
        return $this->types;
    }

    /**
     * @param array|null $types
     */
    public function setTypes(?array $types)
    {
        $this->types = $types;
    }

    /**
     * @return array|null
     */
    public function getRules(): ?array
    {
        return $this->rules;
    }

    /**
     * @param array|null $rules
     */
    public function setRules(?array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * @return string|null
     */
    public function getEvolvesFrom(): ?string
    {
        return $this->evolvesFrom;
    }

    /**
     * @param string|null $evolvesFrom
     */
    public function setEvolvesFrom(?string $evolvesFrom)
    {
        $this->evolvesFrom = $evolvesFrom;
    }

    /**
     * @return array|null
     */
    public function getEvolvesTo(): ?array
    {
        return $this->evolvesTo;
    }

    /**
     * @param array|null $evolvesTo
     */
    public function setEvolvesTo(?array $evolvesTo)
    {
        $this->evolvesTo = $evolvesTo;
    }

    /**
     * @return array|null
     */
    public function getAbilities(): ?array
    {
        return $this->abilities;
    }

    /**
     * @param array|null $abilities
     */
    public function setAbilities(?array $abilities)
    {
        $this->abilities = $abilities;
    }

    /**
     * @return array|null
     */
    public function getAttacks(): ?array
    {
        return $this->attacks;
    }

    /**
     * @param array|null $attacks
     */
    public function setAttacks(?array $attacks)
    {
        $this->attacks = $attacks;
    }

    /**
     * @return array|null
     */
    public function getWeaknesses(): ?array
    {
        return $this->weaknesses;
    }

    /**
     * @param array|null $weaknesses
     */
    public function setWeaknesses(?array $weaknesses)
    {
        $this->weaknesses = $weaknesses;
    }

    /**
     * @return array|null
     */
    public function getResistances(): ?array
    {
        return $this->resistances;
    }

    /**
     * @param array|null $resistances
     */
    public function setResistances(?array $resistances)
    {
        $this->resistances = $resistances;
    }

    /**
     * @return array|null
     */
    public function getRetreatCost(): ?array
    {
        return $this->retreatCost;
    }

    /**
     * @param array|null $retreatCost
     */
    public function setRetreatCost(?array $retreatCost)
    {
        $this->retreatCost = $retreatCost;
    }

    /**
     * @return int|null
     */
    public function getConvertedRetreatCost(): ?int
    {
        return $this->convertedRetreatCost;
    }

    /**
     * @param int|null $convertedRetreatCost
     */
    public function setConvertedRetreatCost(?int $convertedRetreatCost)
    {
        $this->convertedRetreatCost = $convertedRetreatCost;
    }

    /**
     * @return Set
     */
    public function getSet(): Set
    {
        return $this->set;
    }

    /**
     * @param Set $set
     */
    public function setSet(Set $set)
    {
        $this->set = $set;
    }

    /**
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @param string|null $number
     */
    public function setNumber(?string $number)
    {
        $this->number = $number;
    }

    /**
     * @return string|null
     */
    public function getArtist(): ?string
    {
        return $this->artist;
    }

    /**
     * @param string|null $artist
     */
    public function setArtist(?string $artist)
    {
        $this->artist = $artist;
    }

    /**
     * @return string|null
     */
    public function getRarity(): ?string
    {
        return $this->rarity;
    }

    /**
     * @param string|null $rarity
     */
    public function setRarity(?string $rarity)
    {
        $this->rarity = $rarity;
    }

    /**
     * @return string|null
     */
    public function getFlavorText(): ?string
    {
        return $this->flavorText;
    }

    /**
     * @param string|null $flavorText
     */
    public function setFlavorText(?string $flavorText)
    {
        $this->flavorText = $flavorText;
    }

    /**
     * @return array|null
     */
    public function getNationalPokedexNumbers(): ?array
    {
        return $this->nationalPokedexNumbers;
    }

    /**
     * @param array|null $nationalPokedexNumbers
     */
    public function setNationalPokedexNumbers(?array $nationalPokedexNumbers)
    {
        $this->nationalPokedexNumbers = $nationalPokedexNumbers;
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
     * @return CardImages|null
     */
    public function getImages(): ?CardImages
    {
        return $this->images;
    }

    /**
     * @param CardImages|null $images
     */
    public function setImages(?CardImages $images)
    {
        $this->images = $images;
    }

    /**
     * @return AncientTrait|null
     */
    public function getAncientTrait(): ?AncientTrait
    {
        return $this->ancientTrait;
    }

    /**
     * @param AncientTrait|null $ancientTrait
     */
    public function setAncientTrait(?AncientTrait $ancientTrait)
    {
        $this->ancientTrait = $ancientTrait;
    }

    /**
     * @return TCGPlayer|null
     */
    public function getTcgplayer(): ?TCGPlayer
    {
        return $this->tcgplayer;
    }

    /**
     * @param TCGPlayer|null $tcgplayer
     */
    public function setTcgplayer(?TCGPlayer $tcgplayer)
    {
        $this->tcgplayer = $tcgplayer;
    }

    /**
     * @return CardMarket|null
     */
    public function getCardmarket(): ?CardMarket
    {
        return $this->cardmarket;
    }

    /**
     * @param  CardMarket|null  $cardMarket
     */
    public function setCardmarket(?CardMarket $cardMarket): void
    {
        $this->cardmarket = $cardMarket;
    }

}