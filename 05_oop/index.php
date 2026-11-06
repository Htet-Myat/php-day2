<?php

class Student
{
    public string $name;
    public string $email;
    public int $age;

    public function __construct(
        string $name,
        string $email,
        int $age
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
    }

    public function getInformation(): string
    {
        return "My name is {$this->name}. "
            . "My email is {$this->email}. "
            . "I am {$this->age} years old.";
    }
}

$student1 = new Student(
    "Mg Mg",
    "mgmg@gmail.com",
    20
);

$student2 = new Student(
    "Aung Aung",
    "aung@gmail.com",
    22
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP OOP</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            padding: 40px 15px;
        }

        .container {
            max-width: 750px;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #2563eb;
        }

        .student-card {
            background: white;
            padding: 25px;
            margin-bottom: 18px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .06);
        }

        .student-card h3 {
            color: #1d4ed8;
        }
    </style>
</head>

<body>

    <div class="container">

        <h2>Student Information</h2>

        <div class="student-card">
            <h3>Student 1</h3>
            <p><?= htmlspecialchars($student1->getInformation()) ?></p>
        </div>

        <div class="student-card">
            <h3>Student 2</h3>
            <p><?= htmlspecialchars($student2->getInformation()) ?></p>
        </div>

    </div>

</body>

</html>