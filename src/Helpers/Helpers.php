<?php
declare(strict_types=1);

namespace App\Helpers;

class Helpers {
    public static function randomFloat()
    {
        return mt_rand( 0, 100 ) / 100;
    }
}

