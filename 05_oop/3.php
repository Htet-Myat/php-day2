<?php

namespace Day2\no3;

class Person
{
    public function introduce(): string
    {
        return "I am a person.";
    }
}

class Student extends Person
{
    public function study(): string
    {
        return "I am studying PHP.";
    }
}

$student = new Student();

echo $student->introduce();
echo "<br>";
echo $student->study();
