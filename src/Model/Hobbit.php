<?php


namespace App\Model;


class Hobbit extends ChildrenOfIluvatar
{
    public function getFightPower(): float
    {
        return 10 * $this->strength + 20 * $this->intelligence + 20 * $this->charisma;
    }

    public function isEvil(): bool
    {
        return false;
    }
}