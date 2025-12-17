<x-guest-layout>
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

        .container {
            width: 850px;
            height: 500px;
            display: flex;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.4);
        }

        /* Left: registration form */
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

        .login-link {
            margin-top: 15px;
            font-size: 14px;
        }

        .login-link a {
            color: #ff6600;
            text-decoration: none;
            font-weight: bold;
        }

        /* Right: welcome message */
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

    <div class="container">
        <!-- Left: Registration Form -->
        <div class="left">
            <h2>Register</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-box">
                    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus />
                    <i>👤</i>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
                    <i>📧</i>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required />
                    <i>🔒</i>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="input-box">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required />
                    <i>🔒</i>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <button type="submit" class="btn">Register</button>
            </form>

            <div class="login-link">
                Already registered? <a href="{{ route('login') }}">Login</a>
            </div>
        </div>

        <!-- Right: Welcome Message -->
        <div class="right">
            <h1>WELCOME!</h1>
            <p>We are happy to have you with us. Fill the form to create your account and start your journey with us.</p>
        </div>
    </div>
</x-guest-layout>
