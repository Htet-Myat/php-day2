<?php
session_start();

if (empty($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0fdf4;
            padding: 40px 15px;
        }

        .dashboard {
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
            text-align: center;
        }

        h2 {
            color: #15803d;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            padding: 12px 25px;
            background: #dc2626;
            color: white;
            text-decoration: none;
            border-radius: 7px;
        }
    </style>
</head>

<body>

    <div class="dashboard">

        <h2>Welcome, <?= htmlspecialchars($username) ?>!</h2>

        <p>You have successfully logged in.</p>

        <a href="logout.php">Logout</a>

    </div>

</body>

</html>