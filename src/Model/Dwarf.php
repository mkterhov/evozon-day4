<?php


namespace App\Model;


class Dwarf extends Warrior
{
    const STRENGTH_MODIFIER = 40;
    const INTELLIGENCE_MODIFIER = 10;
    const CHARISMA_MODIFIER = 10;

    public function __serialize(): array
    {
        // TODO: Implement __serialize() method.
    }

    public function __unserialize(array $data): void
    {
        // TODO: Implement __unserialize() method.
    }
}