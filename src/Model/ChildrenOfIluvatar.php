<?php


namespace App\Model;


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
        return sprintf(' %s : BY NAME %s',get_class($this),$this->getName());
    }
}