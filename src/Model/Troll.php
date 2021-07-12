<?php


namespace App\Model;


class Troll extends ChildrenOfIluvatar
{
    private float $supernaturalPowers;

    public function __construct(string $name, float $strength, float $intelligence, float $charisma, float $supernaturalPowers)
    {
        $this->supernaturalPowers = $supernaturalPowers;
        parent::__construct($name, $strength, $intelligence, $charisma);
    }

    public function getFightPower(): float
    {
        return 50 * $this->strength + 1 * $this->intelligence + 1 * $this->charisma + 10 * $this->supernaturalPowers;
    }

    public function isEvil(): bool
    {
        return true;
    }
}