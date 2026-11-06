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

        <!-- PHP ဖြုတ်ထားတဲ့အတွက် နမူနာအနေနဲ့ Admin လို့ ရေးထားပါတယ် -->
        <h2>Welcome, Admin!</h2>

        <p>You have successfully logged in.</p>

        <!-- ပြန်ထွက်မယ့် Link ကို login.html လို့ ပြောင်းထားပါတယ် -->
        <a href="login.html">Logout</a>

    </div>

</body>

</html>