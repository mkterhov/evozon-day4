<?php

require __DIR__.'/vendor/autoload.php';

use App\Service\GenerateWarriors;

$warriorGenerator = new GenerateWarriors();

$warriorGenerator->createWarriors(10);

var_dump($warriorGenerator->getWarriors());