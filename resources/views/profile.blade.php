<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Melodex</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            font-size: 24px;
            margin-bottom: 20px;
        }

        button {
            width: 100%;
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
            margin-bottom: 10px;
        }

        .back-button:hover {
            background-color: #be7fdb;
            transform: translateY(-10px);
        }
        .dash-icon {
            position: fixed;
            top: 20px;
            right: 20px;
            font-size: 25px;
            color: #66128e;
            background-color: white;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .dash-icon:hover {
            background-color: #be7fdb;
        }
    </style>
</head>
<body>
    <video autoplay muted loop>
        <source src="{{ asset('videos/purple.mp4') }}" type="video/mp4">
            Your browser does not support the video tag or the file is missing.
    </video>
    <div class="container">
        <h1>Welcome to Your Profile, {{ auth()->user()->name }}!</h1>
    <p>This is your profile page.</p>
    </div>
    <a href="{{ route('dashboard') }}" class="dash-icon">
        <i class="fas fa-home"></i>
    </a>
</body>
</html>
