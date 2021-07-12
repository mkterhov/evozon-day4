<?php


namespace App\Model;


use App\Traits\Supernatural;

class Troll extends Warrior
{
    use Supernatural;

    const STRENGTH_MODIFIER = 50;
    const INTELLIGENCE_MODIFIER = 1;
    const CHARISMA_MODIFIER = 1;
    const SUPERNATURAL_MODIFIER = 10;

    public function __construct(string $name, float $strength, float $intelligence, float $charisma, float $supernaturalPowers)
    {
        $this->supernaturalPowers = $supernaturalPowers;
        parent::__construct($name, $strength, $intelligence, $charisma);
    }

    public function calculateFightPower(): float
    {
        return parent::calculateFightPower() + static::SUPERNATURAL_MODIFIER * $this->supernaturalPowers;
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