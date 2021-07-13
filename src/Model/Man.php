<?php


namespace App\Model;


class Man extends ChildrenOfIluvatar
{
    public function getFightPower(): float
    {
        return 30 * $this->strength + 30 * $this->intelligence + 10 * $this->charisma;
    }

    public function isEvil(): bool
    {
        return false;
    }
}