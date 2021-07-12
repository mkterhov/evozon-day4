<?php
declare(strict_types=1);

namespace App\Service;

use App\Model\ChildrenOfIluvatar;
use App\Model\EntityClasses;
use Exception;

class GenerateWarriors
{
    private array $warriors = [];
    private WarriorFactory $warriorFactory;


    public function __construct()
    {
        $this->warriorFactory = new WarriorFactory();
    }

    /**
     * @return array
     */
    public function getWarriors(): array
    {
        return $this->warriors;
    }

    /**
     * @param int $nr
     * @throws \InvalidArgumentException
     */
    public function createWarriors(int $nr): void
    {
        if($nr<=0) {
            throw new \InvalidArgumentException("Number of warriors can't be 0 or negative!");
        }
        while ($nr > 0) {
            $className = EntityClasses::CLASS_NAMES[array_rand(EntityClasses::CLASS_NAMES)];
            try {
                array_push($this->warriors, $this->warriorFactory->createWarrior($className));
            } catch (Exception $e) {
                echo 'Whoops! ' . $e->getMessage();
            }
            $nr--;
        }
    }
}