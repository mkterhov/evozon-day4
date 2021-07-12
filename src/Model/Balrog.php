<?php


namespace App\Model;


use App\Traits\Supernatural;

class Balrog extends Warrior
{
    use Supernatural;

    const STRENGTH_MODIFIER = 60;
    const INTELLIGENCE_MODIFIER = 5;
    const CHARISMA_MODIFIER = 1;
    const SUPERNATURAL_MODIFIER = 30;

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