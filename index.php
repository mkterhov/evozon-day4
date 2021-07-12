<?php

require __DIR__.'/vendor/autoload.php';

use App\Service\GenerateWarriors;

$warriorGenerator = new GenerateWarriors();

$warriorGenerator->createWarriors(10);

foreach ($warriorGenerator->getWarriors() as $warrior) {
    $serializedWarrior = serialize($warrior);
    echo $serializedWarrior . PHP_EOL;
    $deserializedWarrior = unserialize($serializedWarrior);
    echo $deserializedWarrior->getFightPower() . PHP_EOL;

}