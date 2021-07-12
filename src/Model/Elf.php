<?php


namespace App\Model;


class Elf extends ChildrenOfIluvatar
{
    private float $supernaturalPowers;

    public function __construct(string $name, float $strength, float $intelligence, float $charisma, float $supernaturalPowers)
    {
        $this->supernaturalPowers = $supernaturalPowers;
        parent::__construct($name, $strength, $intelligence, $charisma);
    }

    public function getFightPower(): float
    {
        return 30 * $this->strength + 30 * $this->intelligence + 5 * $this->charisma + 10 * $this->supernaturalPowers;
    }

    public function isEvil(): bool
    {
        return false;
    }
}