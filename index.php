<?php

require __DIR__.'/vendor/autoload.php';

use App\Service\GenerateWarriors;

$warriorGenerator = new GenerateWarriors();

$warriorGenerator->createWarriors(4);

foreach ($warriorGenerator->getWarriors() as $warrior) {
    $serializedWarrior = serialize($warrior);
    echo $serializedWarrior . PHP_EOL;
    $deserializedWarrior = unserialize($serializedWarrior);
    echo $deserializedWarrior . PHP_EOL;

}