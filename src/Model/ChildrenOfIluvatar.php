<?php


namespace App\Model;


use App\Helpers\Helpers;

abstract class ChildrenOfIluvatar
{
    protected string $name;
    protected float $strength;
    protected float $intelligence;
    protected float $charisma;

    abstract public function getFightPower(): float;

    abstract public function isEvil(): bool;

    public function __construct(string $name, float $strength, float $intelligence, float $charisma)
    {
        $this->name = $name;
        $this->strength = $strength;
        $this->intelligence = $intelligence;
        $this->charisma = $charisma;
    }

    public function getStrength(): float
    {
        return $this->strength;
    }

    public function fight(ChildrenOfIluvatar $opponent): ChildrenOfIluvatar
    {
        if ($this->getFightPower() < $opponent->getFightPower()) {
            return Helpers::randomFloat() < 0.01 ? $this : $opponent;
        }
        if ($this->getFightPower() > $opponent->getFightPower()) {
            return Helpers::randomFloat() < 0.01 ? $opponent : $this;
        }
        return Helpers::randomFloat() < 0.50 ? $opponent : $this;
    }

    public function setStrength(float $strength): void
    {
        $this->strength = $strength;
    }

    public function getIntelligence(): float
    {
        return $this->intelligence;
    }

    public function setIntelligence(float $intelligence): void
    {
        $this->intelligence = $intelligence;
    }

    public function getCharisma(): float
    {
        return $this->charisma;
    }

    public function setCharisma(float $charisma): void
    {
        $this->charisma = $charisma;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return sprintf(
            'ClassName: %s | STRENGTH: %s | ARMY: %s | NAME: %s | FIGHT_POWER: %d',
            get_class($this),
            $this->getStrength(),
            $this->isEvil() ? "EVIL" : "GOOD",
            $this->getName(),
            $this->getFightPower()
        );
    }
}