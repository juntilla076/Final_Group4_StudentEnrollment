<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <style>
        /* Reset and global styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #2b0040;
        }

        /* Main container */
        .container {
            width: 850px;
            height: 420px;
            display: flex;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.4);
        }

        /* Left section: login form */
        .left {
            width: 50%;
            background: #111;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .left h2 {
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 600;
        }

        .input-box {
            width: 100%;
            margin-bottom: 20px;
            position: relative;
        }

        .input-box input {
            width: 100%;
            padding: 10px 40px 10px 10px;
            border: none;
            border-bottom: 2px solid #555;
            background: transparent;
            color: white;
            font-size: 15px;
            outline: none;
        }

        .input-box i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }

        .btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 25px;
            background: linear-gradient(90deg, #ff6600, #cc3300);
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: 600;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .signup-link {
            margin-top: 15px;
            font-size: 14px;
        }

        .signup-link a {
            color: #ff6600;
            text-decoration: none;
            font-weight: bold;
        }

        /* Right section: welcome message */
        .right {
            width: 50%;
            background: linear-gradient(135deg, #ff6600, #cc3300);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 40px;
        }

        .right h1 {
            font-size: 32px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .right p {
            font-size: 15px;
            line-height: 1.5;
            max-width: 300px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left side: login form -->
        <div class="left">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-box">
                    <input type="text" name="email" placeholder="Username" required />
                    <i>👤</i>
                </div>

                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required />
                    <i>🔒</i>
                </div>

                <button type="submit" class="btn">Login</button>
            </form>

            <div class="signup-link">
                Don’t have an account? <a href="{{ route('register') }}">Sign Up</a>
            </div>
        </div>

        <!-- Right side: welcome message -->
        <div class="right">
            <h1>WELCOME BACK!</h1>
            <p>
                We are happy to have you with us again. If you need anything, we are here to help.
            </p>
        </div>
    </div>
</body>
</html>
