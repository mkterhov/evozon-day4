<?php

namespace App\Model;


class Wizard extends ChildrenOfIluvatar
{
    private float $supernaturalPowers;

    public function __construct(string $name, float $strength, float $intelligence, float $charisma, float $supernaturalPowers)
    {
        $this->supernaturalPowers = $supernaturalPowers;
        parent::__construct($name, $strength, $intelligence, $charisma);
    }

    public function getFightPower(): float
    {
        return 20 * $this->strength + 30 * $this->intelligence + 5 * $this->charisma + 20 * $this->supernaturalPowers;
    }

    public function isEvil(): bool
    {
        return false;
    }
}