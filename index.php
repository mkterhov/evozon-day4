<?php

require __DIR__ . '/vendor/autoload.php';

use App\Service\BattleManagerService;
use App\Service\SerializeEntitiesService;
use App\Service\WarriorStorage;

$serializer = new SerializeEntitiesService('moria.txt');
$serializer->serializeRandomDataToFile(100);

$storage = new WarriorStorage($serializer);
$battleManager = new BattleManagerService($storage);

$battleManager->battle();
