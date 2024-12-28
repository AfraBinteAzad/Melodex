<!DOCTYPE html>
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
            margin-bottom: 10px;
        }

        h2, h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        audio {
            margin-top: 20px;
            width: 100%;
            background-color: #f0f0f0;
            border-radius: 4px;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background-color: #201d77;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #be7fdb;
        }

        .home-icon {
            position: fixed;
            top: 20px;
            right: 20px;
            font-size: 30px;
            color: #66128e;
            background-color: white;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .home-icon:hover {
            background-color: #be7fdb;
        }
    </style>
</head>

<body>
    <video autoplay muted loop>
        <source src="{{ asset('videos/purple.mp4') }}" type="video/mp4">      
    </video>

    <div class="container">
        <h1>Now Playing: {{ $song->Song }}</h1>
        <h2>Artist: {{ $song->Artist }}</h2>
        <h3>Album: {{ $song->Album }}</h3>
    
        <audio controls>
            <source src="{{ asset('storage/' . $song->mp3_file) }}" type="audio/mp3">
        </audio>
    </div>

    <a href="{{ route('dashboard') }}" class="home-icon">
        <i class="fas fa-home"></i>
    </a>
</body>
</html>
