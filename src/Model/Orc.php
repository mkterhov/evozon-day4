<?php


namespace App\Model;


use App\Traits\Supernatural;

class Orc extends Warrior
{
    use Supernatural;

    const STRENGTH_MODIFIER = 30;
    const INTELLIGENCE_MODIFIER = 10;
    const CHARISMA_MODIFIER = 1;
    const SUPERNATURAL_MODIFIER = 5;

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