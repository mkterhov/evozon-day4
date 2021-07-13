<?php


namespace App\Service;


use App\Model\Balrog;
use App\Model\ChildrenOfIluvatar;
use App\Model\Type;

class BattleManagerService
{
    /**
     * @var ChildrenOfIluvatar[]|array
     */
    public array $armyOfTheGood = [];

    /**
     * @var ChildrenOfIluvatar[]|array
     */
    public array $armyOfTheEvil = [];

    private WarriorStorage $storage;

    public function __construct(WarriorStorage $storage)
    {
        $this->storage = $storage;
        $warriors = array_filter($storage->getAllWarriors(), function ($warrior) {
            return !($warrior instanceof Balrog);
        });
        $this->armyOfTheEvil = array_values(array_filter($warriors, function ($warrior) {
            return $warrior->isEvil();
        }));
        $this->armyOfTheGood = array_values(array_filter($warriors, function ($warrior) {
            return !$warrior->isEvil();
        }));
    }

    public function battle()
    {
        while (min(count($this->armyOfTheGood), count($this->armyOfTheEvil)) !== 0) {
            $largestArmySize = min(count($this->armyOfTheGood), count($this->armyOfTheEvil));
            for ($i = 0; $i < $largestArmySize; $i++) {
                if (empty($this->armyOfTheGood) || empty($this->armyOfTheEvil)) {
                    break;
                }
                $evilIndex = mt_rand(0, count($this->armyOfTheEvil) - 1);
                $goodIndex = mt_rand(0, count($this->armyOfTheGood) - 1);
                $goodFighter = $this->armyOfTheGood[$goodIndex];
                $evilFighter = $this->armyOfTheEvil[$evilIndex];
                echo count($this->armyOfTheGood) . " " . count($this->armyOfTheEvil) . PHP_EOL;
                $winner = $goodFighter->fight($evilFighter);
                echo sprintf(
                    'FIGHT IS BETWEEN: %s (good) and %s (evil)' . PHP_EOL,
                    $goodFighter->getName(),
                    $evilFighter->getName()
                );
                if ($winner->isEvil()) {
                    unset($this->armyOfTheGood[$goodIndex]);
                    $this->armyOfTheGood = array_values($this->armyOfTheGood);
                    echo "THE WINNER IS " . $evilFighter . PHP_EOL;
                }
                if (!$winner->isEvil()) {
                    unset($this->armyOfTheEvil[$evilIndex]);
                    $this->armyOfTheEvil = array_values($this->armyOfTheEvil);
                    echo "THE WINNER IS " . $goodFighter . PHP_EOL;
                }
            }
        }
        $winningSide = !empty($this->armyOfTheEvil) ? Type::EVIL : Type::GOOD;
        $this->storage->saveWarriors(array_merge($this->armyOfTheEvil, $this->armyOfTheGood));
        $finalMessage = sprintf("THE FORCES OF %s WON!", $winningSide);
        echo $finalMessage . PHP_EOL;
    }
}