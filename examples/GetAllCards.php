<?php

require __DIR__ . '/../vendor/autoload.php';

$response = \Pokemon\Pokemon::Type()->all();
print_r($response);

$response = \Pokemon\Pokemon::Card()->find('xy7-54');
print_r($response);