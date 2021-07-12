<?php


namespace App\Model;


use App\Interfaces\ChildrenOfIluvatar;

abstract class Warrior implements ChildrenOfIluvatar
{
    protected string $name;
    protected float $strength;
    protected float $intelligence;
    protected float $charisma;
    protected float $fightPower;

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

    public function getFightPower(): float
    {
        return $this->fightPower;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    abstract public function calculateFightPower(): void;

    abstract public function __serialize(): array;

    abstract public function __unserialize(array $data): void;
}