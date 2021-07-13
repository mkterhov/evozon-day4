<?php

require __DIR__ . '/vendor/autoload.php';

use App\Service\BattleManagerService;
use App\Service\SerializeEntitiesService;
use App\Service\WarriorStorage;

$serializer = new SerializeEntitiesService('moria.txt');
$serializer->serializeRandomDataToFile();
$storage = new WarriorStorage($serializer);
$battleManager = new BattleManagerService($storage);
foreach ($battleManager->armyOfTheEvil as $entity) {
    echo $entity . PHP_EOL;
}
foreach ($battleManager->armyOfTheGood as $entity) {
    echo $entity . PHP_EOL;
}