<?php
class Cat
{
    private $name;
    private $color;
    public function __construct(string $name, string $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function sayHello(): string
    {
        return 'Привет!Меня зовут '.$this->name.'. Мой цвет - '.$this->color;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getColor(): string
    {
        return $this->color;
    }
}

$cat = new Cat('Petya','orange');
echo $cat->sayHello();