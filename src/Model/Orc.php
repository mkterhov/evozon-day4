<?php


namespace App\Model;


class Orc extends ChildrenOfIluvatar
{
    private float $supernaturalPowers;

    public function __construct(string $name, float $strength, float $intelligence, float $charisma, float $supernaturalPowers)
    {
        $this->supernaturalPowers = $supernaturalPowers;
        parent::__construct($name, $strength, $intelligence, $charisma);
    }

    public function getFightPower(): float
    {
        return 30 * $this->strength + 10 * $this->intelligence + 1 * $this->charisma + 5 * $this->supernaturalPowers;
    }

    public function isEvil(): bool
    {
        return true;
    }

    public function __serialize(): array
    {
        return [
            'name' => $this->name,
            'strength' => $this->strength,
            'intelligence' => $this->intelligence,
            'charisma' => $this->charisma,
            'supernaturalPowers' => $this->supernaturalPowers,
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->name = $data['name'];
        $this->strength = $data['strength'];
        $this->intelligence = $data['intelligence'];
        $this->charisma = $data['charisma'];
        $this->supernaturalPowers = $data['supernaturalPowers'];
    }
}