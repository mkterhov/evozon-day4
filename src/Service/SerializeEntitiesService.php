<?php


namespace App\Service;


use App\Model\ChildrenOfIluvatar;

class SerializeEntitiesService
{
    private GenerateWarriors $generateWarriors;
    private string $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
        $this->generateWarriors = new GenerateWarriors();
    }

    public function serializeRandomDataToFile(int $nr = 10)
    {
        $this->generateWarriors->createWarriors($nr);
        $warriors = $this->generateWarriors->getWarriors();
//        file_put_contents($this->fileName, base64_encode(serialize($warriors)));
        file_put_contents($this->fileName, serialize($warriors));
    }

    public function serializeArrayToFile(array $entities): void
    {
//        file_put_contents($this->fileName, base64_encode(serialize($entities)));
        file_put_contents($this->fileName, serialize($entities));
    }

    /**
     * @return ChildrenOfIluvatar[]| array
     */
    public function unserializeDataFromFile(): array
    {
//        return unserialize(base64_decode(file_get_contents($this->fileName)));
        return unserialize(file_get_contents($this->fileName));
    }
}