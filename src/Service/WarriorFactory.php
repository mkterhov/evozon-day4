<?php

declare(strict_types=1);

namespace App\Service;

use App\Helpers\Helpers;
use App\Model\ChildrenOfIluvatar;
use App\Model\EntityClasses;
use App\Model\Type;
use Exception;

class WarriorFactory
{
    const NAMES = ['Jim', 'John', 'Anna', 'Rob', 'Sam', 'Gal', 'Bilbo', 'Eowyn', 'Gandalf'];

    public function create(string $className, string $type)
    {
        $name = self::NAMES[array_rand(self::NAMES)];
        $strength = Helpers::randomFloat();
        $intelligence = Helpers::randomFloat();
        $charisma = Helpers::randomFloat();
        if ($type == Type::SUPERNATURAL_BEING) {
            $supernaturalPowers = Helpers::randomFloat();
            return new $className($name, $strength, $intelligence, $charisma, $supernaturalPowers);
        }
        return new $className($name, $strength, $intelligence, $charisma);
    }

    /**
     * @throws Exception
     */
    public function createWarrior($className)
    {
        if (in_array($className, EntityClasses::NORMAL_BEINGS)) {
            return $this->create($className,Type::NORMAL_BEING);
        }
        if (in_array($className, EntityClasses::SUPERNATURAL_BEINGS)) {
            return $this->create($className,Type::SUPERNATURAL_BEING);
        }
        throw new Exception("Can't create entity!");
    }
}