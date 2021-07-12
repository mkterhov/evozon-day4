<?php


namespace App\Model;


use App\Traits\Supernatural;

class Wizard extends Warrior
{
    use Supernatural;

    const STRENGTH_MODIFIER = 20;
    const INTELLIGENCE_MODIFIER = 30;
    const CHARISMA_MODIFIER = 5;
    const SUPERNATURAL_MODIFIER = 20;

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