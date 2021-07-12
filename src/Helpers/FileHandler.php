<?php


namespace App\Helpers;


class FileHandler
{
    public static function writeToFile(string $filename,string $content): void
    {
        file_put_contents($filename,$content);
    }
}