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

        <!-- Error Message (ပုံစံပြရန်အတွက်သာ) -->
        <!-- 
        <div class="error">
            <p>Name is required.</p>
            <p>Invalid email address.</p>
        </div> 
        -->

        <!-- Success Message (ပုံစံပြရန်အတွက်သာ) -->
        <!-- 
        <div class="success">
            <h3>Registration Validated!</h3>
            <p>Name: Mg Mg</p>
            <p>Email: mgmg@gmail.com</p>
            <p>Age: 20</p>
            <p>Password has been hashed successfully.</p>
        </div> 
        -->

        <form>
            <label>Student Name</label>
            <input type="text" name="name" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Age</label>
            <input type="number" name="age" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Validate Registration</button>
        </form>

    </div>

</body>

</html>