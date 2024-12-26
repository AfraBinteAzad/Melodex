<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1; 
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8); 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            z-index: 1; 
        }

        h1 {
            margin-bottom: 20px;
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 90%;
            padding: 10px;
            background-color: #66128e;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #be7fdb;
            transform: translateY(-5px);
        }

        a {
            text-decoration: none;
            color: #66128e;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #be7fdb;
        }
    </style>
</head>
<body>
    <video autoplay muted loop>
        <source src="{{ asset('videos/purple.mp4') }}" type="video/mp4">
            Your browser does not support the video tag or the file is missing.
    </video>
    @auth
        <div class="container">
            <h1>Welcome to the Melodex!!!</h1>
            <form action="logout" method="POST">
                @csrf
                <button type="submit">Log Out</button>
            </form>
        </div>
    @else
        <div class="container">
            <h1>Login</h1>
            <form action="/loginsubmit" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Log In</button>
            </form>
            <p>Don't have an account? <a href="/register">Register here</a></p>
        </div>
    @endauth
</body>
</html>
