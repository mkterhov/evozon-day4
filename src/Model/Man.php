<?php


namespace App\Model;


class Man extends Warrior
{
    const STRENGTH_MODIFIER = 30;
    const INTELLIGENCE_MODIFIER = 30;
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