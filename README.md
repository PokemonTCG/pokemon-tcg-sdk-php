# Pokémon TCG SDK

[![pokemontcg-developers on discord](https://img.shields.io/badge/discord-pokemontcg--developers-738bd7.svg)](https://discord.gg/dpsTCvg)
[![Build Status](https://travis-ci.org/PokemonTCG/pokemon-tcg-sdk-php.svg?branch=master)](https://travis-ci.org/PokemonTCG/pokemon-tcg-sdk-php)
[![Code Climate](https://codeclimate.com/github/PokemonTCG/pokemon-tcg-sdk-php/badges/gpa.svg)](https://codeclimate.com/github/PokemonTCG/pokemon-tcg-sdk-php)

This is the Pokémon TCG SDK PHP implementation. It is a wrapper around the Pokémon TCG API of [pokemontcg.io](http://pokemontcg.io/).

## Installation
    
    composer require pokemon-tcg/pokemon-tcg-sdk-php
    
## Usage
    
#### Set ApiKey and options
[See the Guzzle 7 documentation for available options.](https://docs.guzzlephp.org/en/stable/request-options.html)
    
    Pokemon::Options(['verify' => true]);
    Pokemon::ApiKey('<YOUR_API_KEY_HERE>');

#### Find a Card by id

    $card = Pokemon::Card()->find('xy1-1');
    
#### Filter Cards via query parameters

    $cards = Pokemon::Card()->where(['set.name' => 'generations'])->where(['supertype' => 'pokemon'])->all();
    
    $cards = Pokemon::Card()->where([
        'set.name' => 'roaring skies',
        'subtypes' => 'ex'
    ])->all();
    
#### Get all Cards

    $cards = Pokemon::Card()->all();
    
#### Paginate Card queries

    $cards = Pokemon::Card()->where([
        'set.legalities.standard' => 'legal'
    ])->page(8)->pageSize(100)->all();
    
#### Get Card pagination information

    $pagination = Pokemon::Card()->where([
        'set.legalities.standard' => 'legal'
    ])->pagination();
    
#### Find a Set by set code

    $set = Pokemon::Set()->find('base1');
    
#### Filter Sets via query parameters

    $set = Pokemon::Set()->where(['legalities.standard' => 'legal'])->all();
    
#### Paginate Set queries

    $set = Pokemon::Set()->page(2)->pageSize(10)->all();
    
#### Get Set pagination information

    $pagination = Pokemon::Set()->pagination();
    
#### Get all Sets

    $sets = Pokemon::Set()->all();
    
#### Get all Types

    $types = Pokemon::Type()->all();
    
#### Get all Subtypes

    $subtypes = Pokemon::Subtype()->all();
    
#### Get all Supertypes

    $supertypes = Pokemon::Supertype()->all();
    
#### Get all Rarities

    $supertypes = Pokemon::Rarity()->all();
    