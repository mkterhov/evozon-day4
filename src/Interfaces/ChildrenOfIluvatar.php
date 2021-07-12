<?php


namespace App\Interfaces;
//A certain level of strength (float between 0 and 1)
//A certain level of intelligence (float between 0 and 1)
//A certain level of charisma (float between 0 and 1)
//A certain level of fightPower (float between 0 and 100)

interface ChildrenOfIluvatar
{
    public function __serialize(): array;
    public function __unserialize(array $data): void;
}