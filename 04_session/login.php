<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    // Demo credentials only
    if ($username === "admin" && $password === "12345678") {

        session_regenerate_id(true);

        $_SESSION["username"] = $username;
        $_SESSION["logged_in"] = true;

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2ff;
            padding: 50px 15px;
        }

        .login-box {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
        }

        h2 {
            text-align: center;
            color: #4338ca;
        }

        label {
            display: block;
            margin: 15px 0 7px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            background: #4338ca;
            color: white;
            border: 0;
            border-radius: 7px;
            cursor: pointer;
        }

        .error {
            color: #991b1b;
            background: #fee2e2;
            padding: 10px;
            border-radius: 7px;
        }
    </style>
</head>

<body>

    <div class="login-box">

        <h2>Student Login</h2>

        <?php if ($error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="POST">

            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>

        </form>

    </div>

</body>

</html>