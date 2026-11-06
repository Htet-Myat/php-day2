<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name  = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $age   = $_POST["age"] ?? "";
} else {
    exit("Invalid Request!");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration Result</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            padding: 40px 15px;
        }

        .result {
            max-width: 550px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
        }

        h2 {
            color: #16a34a;
        }

        .item {
            padding: 12px;
            margin: 10px 0;
            background: #f8fafc;
            border-radius: 7px;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            color: #2563eb;
        }
    </style>
</head>

<body>

    <div class="result">

        <h2>Registration Successful!</h2>

        <div class="item">
            <strong>Name:</strong>
            <?= htmlspecialchars($name) ?>
        </div>

        <div class="item">
            <strong>Email:</strong>
            <?= $email ?>
        </div>

        <div class="item">
            <strong>Age:</strong>
            <?= $age ?>
        </div>

        <a href="form.php">Back to Registration</a>

    </div>

</body>

</html>