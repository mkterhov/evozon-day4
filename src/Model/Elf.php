<?php


namespace App\Model;


use App\Traits\Supernatural;

class Elf extends Warrior
{
    use Supernatural;

    const STRENGTH_MODIFIER = 30;
    const INTELLIGENCE_MODIFIER = 30;
    const CHARISMA_MODIFIER = 5;
    const SUPERNATURAL_MODIFIER = 10;

    public function calculateFightPower(): void
    {
        // TODO: Implement calculateFightPower() method.
    }

    public function __serialize(): array
    {
        // TODO: Implement __serialize() method.
    }

    public function __unserialize(array $data): void
    {
        // TODO: Implement __unserialize() method.
    }
}