<?php


namespace App\Service;


use App\Model\Balrog;

class BattleManagerService
{
    public array $armyOfTheGood = [];
    public array $armyOfTheEvil = [];

    private WarriorStorage $storage;

    public function __construct(WarriorStorage $storage)
    {
        $this->storage = $storage;
        $warriors = $storage->getAllWarriors();
        $warriors = array_filter($warriors, function ($warrior) {
            return !($warrior instanceof Balrog);
        });
        $this->armyOfTheEvil = array_filter($warriors, function ($warrior) {
            return $warrior->isEvil();
        });
        $this->armyOfTheGood = array_filter($warriors, function ($warrior) {
            return !$warrior->isEvil();
        });
    }
}