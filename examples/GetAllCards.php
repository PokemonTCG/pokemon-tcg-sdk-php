<?php

require __DIR__ . '/../vendor/autoload.php';

$pokemon = new \Pokemon\Pokemon();
//print_r($pokemon->cards()->all());


print_r($pokemon->cards()->where('name', 'Shaymin')->where('subtype', 'EX')->all());