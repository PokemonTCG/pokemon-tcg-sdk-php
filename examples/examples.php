<?php

require __DIR__ . '/../vendor/autoload.php';

$options = ['verify' => true];

// Get all types
$response = \Pokemon\Pokemon::Type($options)->all();
//print_r($response);

// Get a single card
$response = \Pokemon\Pokemon::Card($options)->find('xy7-54');
//print_r($response->toArray());
//print_r($response->toJson());

// Get Shaymin-EX cards
$response = \Pokemon\Pokemon::Card($options)->where('name', 'shaymin')->where('subtype', 'EX')->all();
//foreach ($response as $model) {
//    print_r($model->toArray());
//}

// Get all sets
$response = \Pokemon\Pokemon::Set($options)->all();
//foreach ($response as $set) {
//    print_r($set->toArray());
//}
