<?php


namespace App\Service;


use App\Helpers\Helpers;
use App\Model\ChildrenOfIluvatar;

class WarriorStorage
{

    const FILE_NAME = 'moria.txt';
    private SerializeEntitiesService $serializer;
    private array $warriors;

    public function __construct(SerializeEntitiesService $serializer)
    {
        $this->serializer = new SerializeEntitiesService(self::FILE_NAME);
        $this->warriors = $this->serializer->unserializeDataFromFile();
    }

    /**
     * @return ChildrenOfIluvatar[]| array
     */
    public function getAllWarriors(): array
    {
        return $this->warriors ?? [];
    }

    public function loadWarriors(): void
    {
        $this->warriors = $this->serializer->unserializeDataFromFile();
    }


    public function saveWarriors(array $warriors): void
    {
        $this->serializer->serializeArrayToFile($warriors);
    }
}