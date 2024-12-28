<!-- resources/views/songslist.blade.php -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songs List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh; /* Allow the body to take up full height */
            display: flex;
            flex-direction: column; /* Stack content vertically */
            justify-content: center; /* Center content horizontally */
            align-items: center; /* Center content vertically */
            color: #333;
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
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            margin-top: 20px;
            overflow-y: auto;
            max-height: 80vh;
        }

        h1 {
            margin-bottom: 20px;
        }

        .go-premium-btn {
            background-color: #66128e;
            color: white;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            cursor: pointer;
        }

        .go-premium-btn:hover {
            background-color: #be7fdb;
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #333;
            background-color: #f8f9fa;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #66128e;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table td a {
            color: #66128e;
            text-decoration: none;
            font-weight: bold;
        }

        table td a:hover {
            text-decoration: underline;
            color: #be7fdb;
        }

        .profile-icon {
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
            z-index: 1;
        }

        .profile-icon:hover {
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
        <h1>Artists and Their Songs</h1>
        
        <!-- Table for Artists and Songs -->
        <table>
            <thead>
                <tr>
                    <th>Artist</th>
                    <th>Songs</th>
                </tr>
            </thead>
            <tbody>
                @foreach($songsByArtist as $artist => $songs)
                    <tr>
                        <td>{{ $artist }}</td>
                        <td>
                            <ul>
                                @foreach($songs as $song)
                                    <li>{{ $song->Song }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <form action="/logout" method="POST">
            @csrf
            <button class="go-premium-btn" type="submit">Logout</button>
        </form>
        <a href="{{ route('dashboard') }}" >
            <button class="go-premium-btn">Dashboard</button>
        </a>
    </div>

    <a href="{{ route('profile') }}" class="profile-icon">
        <i class="fas fa-user"></i>
    </a>
</body>
</html>
