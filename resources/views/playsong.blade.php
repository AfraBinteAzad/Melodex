<html lang="en">
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

        .back-button:hover {
            background-color: #be7fdb;
            transform: translateY(-10px);
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

        audio {
            outline: none;
            margin-top: 20px;
        }
    </style>
</head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Melodex</title>
</head>

<body>
    
    <div class="container">
        <video autoplay muted loop>
            <source src="{{ asset('videos/purple.mp4') }}" type="video/mp4">      
        </video>
        <h1>Now Playing: {{ $song->Song }}</h1>
        <h2>Artist: {{ $song->Artist }}</h2>
        <h3>Album: {{ $song->Album }}</h3>
    
        <audio controls>
            <source src="{{ asset('storage/' . $song->mp3_file) }}" type="audio/mp3">
        </audio>
        
        <br><br>
        <a href="{{ route('dashboard') }}" class="back-button">Back to Dashboard</a>
    </div>

</body>
</html>