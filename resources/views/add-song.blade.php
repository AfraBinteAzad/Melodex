<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Song</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
            overflow-x: hidden; /* Prevent horizontal scroll */
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
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
            max-width: 800px;
            margin: 20px auto;
            z-index: 1;
        }

        h1 {
            margin-bottom: 20px;
            color: #66128e;
            font-size: 28px;
            text-align: center;
        }

        form {
            margin: 20px 0;
        }

        input {
            width: calc(50% - 10px);
            padding: 10px;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            padding: 10px 15px;
            background-color: #66128e;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background-color: #be7fdb;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            background-color: #66128e;
            padding: 10px 15px;
            color: white;
            border-radius: 5px;
            font-size: 14px;
        }

        a:hover {
            background-color: #be7fdb;
        }

        @media (max-width: 768px) {
            input {
                width: calc(100% - 20px);
            }

            button {
                font-size: 12px;
            }

            a {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <video autoplay muted loop>
        <source src="{{ asset('videos/purple.mp4') }}" type="video/mp4">
        Your browser does not support the video tag or the file is missing.
    </video>

    <div class="container">
        <h1>Add a New Song</h1>

        <!-- Add Song Form -->
        <form action="{{ route('admin.add_song') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="artist" placeholder="Artist Name" required>
            <input type="text" name="song" placeholder="Song Name" required>
            <input type="text" name="album" placeholder="Album Name">
            <input type="file" name="mp3_file" accept=".mp3" required>
            <button type="submit">Add Song</button>
        </form>

        <!-- Link back to Dashboard -->
        <a href="{{ route('admin.dashboard') }}">Back to Dashboard</a>
    </div>
</body>
</html>
