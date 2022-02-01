<?php

class Dog
{

    private string $name;
    private string $sex;
    private array $parents;


    public function __construct(string $name, string $sex, array $parents)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->parents = $parents;
    }

    public function getDogsName(): string
    {
        return $this->name;
    }

    public function getParents(): array
    {
        if ($this->hasParents()) {
            return $this->parents;
        }
    }

    public function hasParents(): bool
    {
        if (!empty($this->parents)) {
            return true;
        }
        return false;
    }


    public function fathersName()
    {
        if ($this->hasParents()) {
            return $this->parents[1];
        } else {
            return 'unknown';
        }
    }


}

class DogTest extends Dog
{

    public function __construct(string $name, string $sex, array $parents)
    {
        parent::__construct($name, $sex, $parents);
    }

    public function getFather()
    {

        return parent::fathersName();
    }

}


$dogs = [

    $a = new DogTest('Max', 'male', ['Lady', 'Rocky']),
    $b = new DogTest('Rocky', 'male', ['Molly', 'Sam']),
    $c = new DogTest('Sparky', 'male', []),
    $d = new DogTest('Buster', 'male', ['Lady', 'Sparky']),
    $e = new DogTest('Sam', 'male', []),
    $f = new DogTest('Lady', 'female', []),
    $g = new DogTest('Molly', 'female', []),
    $h = new DogTest('Coco', 'female', ['Molly', 'Buster'])
];


$dogsWithParents = [];
foreach ($dogs as $dog) {

    if ($dog->hasParents()) {
        $dogsWithParents[] = $dog;
    }

    echo "{$dog->getDogsName()}'s father is {$dog->getFather()}" . PHP_EOL;

}

echo '=========================' . PHP_EOL;

function hasTheSameMother($dogsWithParents){
for ($i = 0; $i < count($dogsWithParents); $i++) {
    for ($j = 1; $j < count($dogsWithParents); $j++) {
        if ($i !== $j) {
            if ($dogsWithParents[$i]->getParents()[0] === $dogsWithParents[$j]->getParents()[0]) {
                echo $dogsWithParents[$i]->getDogsName() . " has the same mother as " . $dogsWithParents[$j]->getDogsName() . PHP_EOL;
            }
        }
    }
}
}

hasTheSameMother($dogsWithParents);