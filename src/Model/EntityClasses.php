<?php


namespace App\Model;


class EntityClasses
{
    const CLASS_NAMES = [
        Balrog::class, Elf::class,
        Goblin::class, Orc::class,
        Troll::class, Wizard::class,
        Hobbit::class, Dwarf::class,
        Man::class,
    ];

    const SUPERNATURAL_BEINGS = [
        Balrog::class, Elf::class,
        Goblin::class, Orc::class,
        Troll::class, Wizard::class
    ];

    const NORMAL_BEINGS = [
        Hobbit::class, Dwarf::class,
        Man::class,
    ];
}