<?php


namespace App\Traits;


trait Supernatural
{
    private float $supernaturalPowers;

    public function getSupernaturalPowers(): float
    {
        return $this->supernaturalPowers;
    }

    public function setSupernaturalPowers(float $supernaturalPowers): void
    {
        $this->supernaturalPowers = $supernaturalPowers;
    }

}