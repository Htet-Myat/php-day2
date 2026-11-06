<?php

abstract class Animal
{
    abstract public function makeSound(): string;

    public function sleep(): string
    {
        return "Sleeping...";
    }
}

class Dog extends Animal
{
    public function makeSound(): string
    {
        return "Woof!";
    }
}

$dog = new Dog();

echo $dog->makeSound();
echo "<br>";
echo $dog->sleep();
