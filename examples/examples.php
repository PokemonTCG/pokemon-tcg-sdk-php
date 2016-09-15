<?php

use Pokemon\Pokemon;

require __DIR__ . '/../vendor/autoload.php';

/**
 * Change 'verify' option to true to fix the following error:
 *
 * Fatal error: Uncaught exception 'GuzzleHttp\Exception\ConnectException' with message
 * 'cURL error 35: Unknown SSL protocol error in connection to api.pokemontcg.io:-9838
 * (see http://curl.haxx.se/libcurl/c/libcurl-errors.html)'
 */
$options = ['verify' => false];

/**
 * Get a single card
 */
//$response = Pokemon::Card($options)->find('xy7-54');
//print_r($response->toArray());
//print_r($response->toJson());

/**
 * Get all cards
 */
//$response = Pokemon::Card($options)->all();
//foreach ($response as $model) {
//    print_r($model->toArray());
//    print_r($model->toJson());
//}

/**
 * Get Shaymin-EX cards
 */
//$response = Pokemon::Card($options)->where(['name' => 'shaymin'])->where(['subtype' => 'EX'])->all();
//$response = Pokemon::Card($options)->where(['name' => 'shaymin', 'subtype' => 'EX'])->all();
//foreach ($response as $model) {
//    print_r($model->toArray());
//    print_r($model->toJson());
//}

/**
 * Get Vs Seeker cards
 */
//$response = Pokemon::Card($options)->where(['name' => 'vs seeker'])->all();
//foreach ($response as $model) {
//    print_r($model->toArray());
//    print_r($model->toJson());
//}

/**
 * Get a single set
 */
//$response = Pokemon::Set($options)->find('xy11');
//print_r($response->toArray());
//print_r($response->toJson());

/**
 * Get all sets
 */
//$response = Pokemon::Set($options)->all();
//foreach ($response as $model) {
//    print_r($model->toArray());
//    print_r($model->toJson());
//}

/**
 * Get all types
 */
//$response = Pokemon::Type($options)->all();
//print_r($response);

/**
 * Get all supertypes
 */
//$response = Pokemon::Supertype($options)->all();
//print_r($response);

/**
 * Get all subtypes
 */
//$response = Pokemon::Subtype($options)->all();
//print_r($response);
