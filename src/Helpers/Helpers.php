<?php
declare(strict_types=1);

namespace App\Helpers;

class Helpers {
    public static function random_float(int $min=0,int $max=1)
    {
        return mt_rand( 0, 100 ) / 100;
    }
}

