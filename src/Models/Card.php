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
     * @var string
     */
    private $supertype;

    /**
     * @var array
     */
    private $subtypes;

    /**
     * @var string
     */
    private $hp;

    /**
     * @var array
     */
    private $types;

    /**
     * @var string|null
     */
    private $evolvesFrom;

    /**
     * @var array|null
     */
    private $evolvesTo;

    /**
     * @var array
     */
    private $abilities;

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
     * @var array
     */
    private $retreatCost;

    /**
     * @var int
     */
    private $convertedRetreatCost;

    /**
     * @var Set
     */
    private $set;

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
    private $flavorText;

    /**
     * @var array
     */
    private $nationalPokedexNumbers;

    /**
     * @var Legalities
     */
    private $legalities;

    /**
     * @var CardImages
     */
    private $images;

    /**
     * @var array|null
     */
    private $rules;

    /**
     * @var AncientTrait|null
     */
    private $ancientTrait;

    /**
     * @var TCGPlayer
     */
    private $tcgplayer;

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
    public function getSupertype(): string
    {
        return $this->supertype;
    }

    /**
     * @param string $supertype
     */
    public function setSupertype(string $supertype)
    {
        $this->supertype = $supertype;
    }

    /**
     * @return array
     */
    public function getSubtypes(): array
    {
        return $this->subtypes;
    }

    /**
     * @param array $subtypes
     */
    public function setSubtypes(array $subtypes)
    {
        $this->subtypes = $subtypes;
    }

    /**
     * @return string
     */
    public function getHp(): string
    {
        return $this->hp;
    }

    /**
     * @param string $hp
     */
    public function setHp(string $hp)
    {
        $this->hp = $hp;
    }

    /**
     * @return array
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param array $types
     */
    public function setTypes(array $types)
    {
        $this->types = $types;
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
    public function setEvolvesFrom(string $evolvesFrom)
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
     * @return array
     */
    public function getAbilities(): array
    {
        return $this->abilities;
    }

    /**
     * @param array $abilities
     */
    public function setAbilities(array $abilities)
    {
        $this->abilities = $abilities;
    }

    /**
     * @return array
     */
    public function getAttacks(): array
    {
        return $this->attacks;
    }

    /**
     * @param array $attacks
     */
    public function setAttacks(array $attacks)
    {
        $this->attacks = $attacks;
    }

    /**
     * @return array
     */
    public function getWeaknesses(): array
    {
        return $this->weaknesses;
    }

    /**
     * @param array $weaknesses
     */
    public function setWeaknesses(array $weaknesses)
    {
        $this->weaknesses = $weaknesses;
    }

    /**
     * @return array
     */
    public function getResistances(): array
    {
        return $this->resistances;
    }

    /**
     * @param array $resistances
     */
    public function setResistances(array $resistances)
    {
        $this->resistances = $resistances;
    }

    /**
     * @return array
     */
    public function getRetreatCost(): array
    {
        return $this->retreatCost;
    }

    /**
     * @param array $retreatCost
     */
    public function setRetreatCost(array $retreatCost)
    {
        $this->retreatCost = $retreatCost;
    }

    /**
     * @return int
     */
    public function getConvertedRetreatCost(): int
    {
        return $this->convertedRetreatCost;
    }

    /**
     * @param int $convertedRetreatCost
     */
    public function setConvertedRetreatCost(int $convertedRetreatCost)
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
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber(string $number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getArtist(): string
    {
        return $this->artist;
    }

    /**
     * @param string $artist
     */
    public function setArtist(string $artist)
    {
        $this->artist = $artist;
    }

    /**
     * @return string
     */
    public function getRarity(): string
    {
        return $this->rarity;
    }

    /**
     * @param string $rarity
     */
    public function setRarity(string $rarity)
    {
        $this->rarity = $rarity;
    }

    /**
     * @return string
     */
    public function getFlavorText(): string
    {
        return $this->flavorText;
    }

    /**
     * @param string $flavorText
     */
    public function setFlavorText(string $flavorText)
    {
        $this->flavorText = $flavorText;
    }

    /**
     * @return array
     */
    public function getNationalPokedexNumbers(): array
    {
        return $this->nationalPokedexNumbers;
    }

    /**
     * @param array $nationalPokedexNumbers
     */
    public function setNationalPokedexNumbers(array $nationalPokedexNumbers)
    {
        $this->nationalPokedexNumbers = $nationalPokedexNumbers;
    }

    /**
     * @return Legalities
     */
    public function getLegalities(): Legalities
    {
        return $this->legalities;
    }

    /**
     * @param Legalities $legalities
     */
    public function setLegalities(Legalities $legalities)
    {
        $this->legalities = $legalities;
    }

    /**
     * @return CardImages
     */
    public function getImages(): CardImages
    {
        return $this->images;
    }

    /**
     * @param CardImages $images
     */
    public function setImages(CardImages $images)
    {
        $this->images = $images;
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
    public function setRules(array $rules)
    {
        $this->rules = $rules;
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
    public function setAncientTrait(AncientTrait $ancientTrait)
    {
        $this->ancientTrait = $ancientTrait;
    }

    /**
     * @return TCGPlayer
     */
    public function getTcgplayer(): TCGPlayer
    {
        return $this->tcgplayer;
    }

    /**
     * @param TCGPlayer $tcgplayer
     */
    public function setTcgplayer(TCGPlayer $tcgplayer)
    {
        $this->tcgplayer = $tcgplayer;
    }

}