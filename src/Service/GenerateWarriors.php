<?php
declare(strict_types=1);

namespace App\Service;

use App\Model\ChildrenOfIluvatar;
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
     * @return ChildrenOfIluvatar[]|array
     */
    public function getWarriors(): array
    {
        return $this->warriors;
    }

    public function createWarriors(int $nr): void
    {
        while ($nr > 0) {
            $className = WarriorFactory::CLASS_NAMES[array_rand(WarriorFactory::CLASS_NAMES)];
            try {
                array_push($this->warriors, $this->warriorFactory->createWarrior($className));
            } catch (Exception $e) {
                echo 'Whoops! ' . $e->getMessage();
            }
            $nr--;
        }
    }
}