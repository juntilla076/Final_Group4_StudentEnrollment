<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Enrollment Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: #ffffff;
            width: 420px;
            padding: 40px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        h1 {
            margin-bottom: 15px;
            color: #1e3c72;
        }

        p {
            color: #555;
            font-size: 15px;
            margin-bottom: 30px;
        }

        .buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .btn {
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-register {
            background-color: #1e3c72;
            color: #fff;
        }

        .btn-register:hover {
            background-color: #16325c;
        }

        .btn-login {
            background-color: #e0e0e0;
            color: #333;
        }

        .btn-login:hover {
            background-color: #cfcfcf;
        }

        footer {
            margin-top: 30px;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Student Enrollment Portal</h1>

    <p>
        Manage student registrations, enroll in courses,
        and access academic information easily and securely.
    </p>

    <div class="buttons">
        <a href="{{ route('register') }}" class="btn btn-register">Register</a>
        <a href="{{ route('login') }}" class="btn btn-login">Login</a>
    </div>

    <footer>
        © {{ date('Y') }} Enrollment System
    </footer>
</div>

</body>
</html>
