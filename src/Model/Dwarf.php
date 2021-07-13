<?php


namespace App\Model;


class Dwarf extends ChildrenOfIluvatar
{
    public function getFightPower(): float
    {
        return 40 * $this->strength + 10 * $this->intelligence + 10 * $this->charisma;
    }

    public function isEvil(): bool
    {
        return false;
    }
}