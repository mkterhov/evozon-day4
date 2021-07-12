<?php

require __DIR__.'/vendor/autoload.php';

use App\Service\GenerateWarriors;
use App\Service\SerializeEntitiesService;

$serializer = new SerializeEntitiesService('moria.txt');

$serializer->serializeDataToFile(10);

$entities =  $serializer->unserializeDataFromFile();

foreach ($entities as $entity) {
    echo $entity . PHP_EOL;
}