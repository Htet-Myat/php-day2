<?php

$errors = [];
$success = false;

$name = "";
$email = "";
$age = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $age = trim($_POST["age"] ?? "");
    $password = $_POST["password"] ?? "";

    // Name validation
    if ($name === "") {
        $errors[] = "Name is required.";
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    // Age validation
    $ageNumber = filter_var($age, FILTER_VALIDATE_INT);

    if ($ageNumber === false || $ageNumber < 18 || $ageNumber > 60) {
        $errors[] = "Age must be between 18 and 60.";
    }

    // Password validation
    if (strlen($password) < 8) {
        $errors[] = "Password must contain at least 8 characters.";
    }

    if (empty($errors)) {

        $hashedPassword = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $success = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Secure Registration</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #eef2ff;
            padding: 35px 15px;
        }

        .container {
            max-width: 550px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
        }

        h2 {
            color: #4338ca;
            text-align: center;
        }

        label {
            display: block;
            font-weight: bold;
            margin: 15px 0 7px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
        }

        button {
            width: 100%;
            margin-top: 22px;
            padding: 13px;
            border: none;
            border-radius: 7px;
            color: white;
            background: #4f46e5;
            cursor: pointer;
        }

        .error {
            padding: 12px;
            background: #fee2e2;
            color: #991b1b;
            border-radius: 7px;
            margin-bottom: 15px;
        }

        .success {
            padding: 15px;
            background: #dcfce7;
            color: #166534;
            border-radius: 7px;
        }
    </style>
</head>

<body>

    <div class="container">

        <h2>Secure Student Registration</h2>

        <?php if (!empty($errors)): ?>
            <div class="error">
                <?php foreach ($errors as $error): ?>
                    <p><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>

            <div class="success">
                <h3>Registration Validated!</h3>
                <p>Name: <?= htmlspecialchars($name) ?></p>
                <p>Email: <?= htmlspecialchars($email) ?></p>
                <p>Age: <?= htmlspecialchars($age) ?></p>
                <p>Password has been hashed successfully.</p>
            </div>

        <?php else: ?>

            <form method="POST">

                <label>Student Name</label>
                <input type="text" name="name"
                    value="<?= htmlspecialchars($name) ?>" required>

                <label>Email</label>
                <input type="email" name="email"
                    value="<?= htmlspecialchars($email) ?>" required>

                <label>Age</label>
                <input type="number" name="age"
                    value="<?= htmlspecialchars($age) ?>" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <button type="submit">Validate Registration</button>

            </form>

        <?php endif; ?>

    </div>

</body>

</html>