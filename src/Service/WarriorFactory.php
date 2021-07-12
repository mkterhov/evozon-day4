<?php

declare(strict_types=1);

namespace App\Service;

use App\Helpers\Helpers;
use App\Model;
use App\Model\Balrog;
use App\Model\ChildrenOfIluvatar;
use App\Model\Dwarf;
use App\Model\Elf;
use App\Model\Goblin;
use App\Model\Hobbit;
use App\Model\Man;
use App\Model\Orc;
use App\Model\Troll;
use App\Model\Wizard;
use Exception;

class WarriorFactory
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
    const NAMES = ['Jim', 'John', 'Anna', 'Rob', 'Sam', 'Gal', 'Bilbo', 'Eowyn', 'Gandalf'];
    //merge both the methods
    public function createSupernaturalWarrior(string $className): ChildrenOfIluvatar
    {
        $name = self::NAMES[array_rand(self::NAMES)];
        $strength = Helpers::randomFloat();
        $intelligence = Helpers::randomFloat();
        $charisma = Helpers::randomFloat();
        $supernaturalPowers = Helpers::randomFloat();
        return new $className($name, $strength, $intelligence, $charisma, $supernaturalPowers);
    }

    public function createNormalWarrior(string $className): ChildrenOfIluvatar
    {
        $name = self::NAMES[array_rand(self::NAMES)];
        $strength = Helpers::randomFloat();
        $intelligence = Helpers::randomFloat();
        $charisma = Helpers::randomFloat();
        return new $className($name, $strength, $intelligence, $charisma);
    }

    /**
     * @throws Exception
     */
    public function createWarrior($className): ChildrenOfIluvatar
    {
        if (in_array($className, self::NORMAL_BEINGS)) {
            return $this->createNormalWarrior($className);
        }
        if (in_array($className, self::SUPERNATURAL_BEINGS)) {
            return $this->createSupernaturalWarrior($className);
        }
        throw new Exception("Can't create entity!");
    }
}