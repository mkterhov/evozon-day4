<?php

require __DIR__ . '/vendor/autoload.php';

use App\Service\BattleManagerService;
use App\Service\SerializeEntitiesService;
use App\Service\WarriorStorage;

$serializer = new SerializeEntitiesService('moria.txt');
$serializer->serializeRandomDataToFile();

$storage = new WarriorStorage($serializer);
try {
    $battleManager = new BattleManagerService($storage);
    $battleManager->battle();
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

