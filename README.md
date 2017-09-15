# Pokémon TCG SDK

[![pokemontcg-developers on discord](https://img.shields.io/badge/discord-pokemontcg--developers-738bd7.svg)](https://discord.gg/dpsTCvg)
[![Build Status](https://travis-ci.org/PokemonTCG/pokemon-tcg-sdk-php.svg?branch=master)](https://travis-ci.org/PokemonTCG/pokemon-tcg-sdk-php)
[![Code Climate](https://codeclimate.com/github/PokemonTCG/pokemon-tcg-sdk-php/badges/gpa.svg)](https://codeclimate.com/github/PokemonTCG/pokemon-tcg-sdk-php)

This is the Pokémon TCG SDK PHP implementation. It is a wrapper around the Pokémon TCG API of [pokemontcg.io](http://pokemontcg.io/).

## Installation
    
    composer require pokemon-tcg/pokemon-tcg-sdk-php
    
## Usage

#### Find a Card by id

    $card = Pokemon::Card()->find('xy1-1');
    
#### Filter Cards via query parameters

    $cards = Pokemon::Card()->where(['set' => 'generations'])->where(['supertype' => 'pokemon'])->all();
    $cards = Pokemon::Card()->where([
        'set'     => 'roaring skies',
        'subtype' => 'ex'
    ])->all();
    
#### Find all Cards

    $cards = Pokemon::Card()->all();
    
#### Paginate Card queries

    $cards = Pokemon::Card()->where([
        'page'     => 5,
        'pageSize' => 100
    ])->all();
    
#### Find a Set by set code

    $set = Pokemon::Set()->find('base1');
    
#### Filter Sets via query parameters

    $set = Pokemon::Set()->where(['standardLegal' => 'true'])->all();
    
#### Get all Sets

    $sets = Pokemon::Set()->all();
    
#### Get all Types

    $types = Pokemon::Type()->all();
    
#### Get all Subtypes

    $subtypes = Pokemon::Subtype()->all();
    
#### Get all Supertypes

    $supertypes = Pokemon::Supertype()->all();
    
## Models

#### Card

| Parameter | Type |
| --------- | ---- |
| id | string |
| name | string |
| nationalPokedexNumber | int |
| imageUrl | string |
| imageUrlHiRes | string |
| subtype | string |
| supertype | string |
| ability | Ability |
| ancientTrait | AncientTrait |
| hp | string |
| number | string |
| artist | string |
| rarity | string |
| series | string |
| set | string |
| setCode | string |
| retreatCost | array |
| text | array |
| types | array |
| attacks | array |
| weakness | array |
| resistance | array |

#### Set

| Parameter | Type |
| --------- | ---- |
| code | string |
| ptcgoCode | string |
| name | string |
| series | string |
| totalCards | int |
| standardLegal | boolean |
| releaseDate | string |
| symbolUrl | string |

#### Ability

| Parameter | Type |
| --------- | ---- |
| name | string |
| text | string |
| type | string |

#### AncientTrait

| Parameter | Type |
| --------- | ---- |
| name | string |
| text | string |

#### Attack

| Parameter | Type |
| --------- | ---- |
| cost | array |
| name | string |
| text | string |
| damage | string |
| convertedEnergyCost | int |

#### Resistance

| Parameter | Type |
| --------- | ---- |
| type | string |
| value | string |

#### Weakness

| Parameter | Type |
| --------- | ---- |
| type | string |
| value | string |
