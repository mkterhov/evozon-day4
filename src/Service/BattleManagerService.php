<?php


namespace App\Service;


use App\Model\Balrog;
use App\Model\ChildrenOfIluvatar;
use App\Model\Type;

class BattleManagerService
{
    const FIGHT_IS_BETWEEN_MESSAGE = "FIGHT IS BETWEEN: %s (good) and %s (evil) ";
    const FIGHT_WINNER_MESSAGE = "THE WINNER IS ";
    const BATTLE_WINNER_MESSAGE = "THE FORCES OF %s WON!";
    const BATTLE_SCORE = "GOOD %d:%d EVIL";

    /**
     * @var ChildrenOfIluvatar[]|array
     */
    public array $armyOfTheGood = [];

    /**
     * @var ChildrenOfIluvatar[]|array
     */
    public array $armyOfTheEvil = [];

    /**
     * @var ChildrenOfIluvatar[]|array
     */
    public array $survivingForces = [];

    private WarriorStorage $storage;

    /**
     * @throws \Exception
     */
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
        if (empty($this->armyOfTheGood) || empty($this->armyOfTheEvil)) {
            throw new \Exception('One of the armies is empty!');
        }
    }

    public function battle()
    {
        while (min(count($this->armyOfTheGood), count($this->armyOfTheEvil)) !== 0) {
            $evilIndex = mt_rand(0, count($this->armyOfTheEvil) - 1);
            $goodIndex = mt_rand(0, count($this->armyOfTheGood) - 1);
            $goodFighter = $this->armyOfTheGood[$goodIndex];
            $evilFighter = $this->armyOfTheEvil[$evilIndex];

            echo sprintf(self::BATTLE_SCORE, count($this->armyOfTheGood), count($this->armyOfTheEvil)) . PHP_EOL;

            $winner = $goodFighter->fight($evilFighter);

            echo sprintf(
                self::FIGHT_IS_BETWEEN_MESSAGE . PHP_EOL,
                $goodFighter->getName(),
                $evilFighter->getName()
            );

            if ($winner->isEvil()) {
                $this->removeFighterFromArmy($this->armyOfTheGood, $goodIndex);
            }
            if (!$winner->isEvil()) {
                $this->removeFighterFromArmy($this->armyOfTheEvil, $evilIndex);
            }
            echo self::FIGHT_WINNER_MESSAGE . $winner . PHP_EOL;
        }
        $winningSide = !empty($this->armyOfTheEvil) ? Type::EVIL : Type::GOOD;
        $this->storage->saveWarriors(array_merge($this->armyOfTheEvil, $this->armyOfTheGood));

        $finalMessage = sprintf(self::BATTLE_WINNER_MESSAGE, $winningSide);
        echo $finalMessage . PHP_EOL;
    }

    /**
     * @param $army
     * @param $index
     */
    private function removeFighterFromArmy(&$army, $index): void
    {
        unset($army[$index]);
        $army = array_values($army);
    }
}