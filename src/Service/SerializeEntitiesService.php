<?php


namespace App\Service;


class SerializeEntitiesService
{
    private GenerateWarriors $generateWarriors;
    private string $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
        $this->generateWarriors = new GenerateWarriors();
    }

    public function serializeDataToFile(int $nr)
    {
        $this->generateWarriors->createWarriors($nr);
        $warriors = $this->generateWarriors->getWarriors();
        file_put_contents($this->fileName, serialize($warriors));
    }

    public function unserializeDataFromFile(): array
    {
        return unserialize(file_get_contents($this->fileName));
    }
}