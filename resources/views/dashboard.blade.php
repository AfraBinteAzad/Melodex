<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
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
            max-width: 500px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        input, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        input {
            border: 1px solid #ccc;
        }

        button {
            background-color: #66128e;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #be7fdb;
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .go-premium-btn {
            background-color: #66128e;
            color: white;
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

        .no-results {
            color: #999;
            margin-top: 20px;
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
        <h1>Welcome back to Melodex, {{ auth()->user()->name }}!</h1>

        <form action="/search" method="GET">
            @csrf
            <input type="text" name="query" placeholder="Search for an artist, album, or song..." required>
            <button type="submit">Search</button>
        </form>

        
        <a href="{{ route('songslist') }}"> 
            <button class="go-premium-btn">List ALL</button>
        </a>

        <a href="{{ route('subscription') }}">
            <button class="go-premium-btn">Wanna Go Premium?</button>
        </a>

        <form action="/logout" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
        

        @if(isset($results))
        <div class="results">
            <h2>Search Results:</h2>
            @if(count($results) > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Song</th>
                            <th>Artist</th>
                            <th>Album</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                        <tr>
                            <td><a href="{{ route('playsong', urlencode($result->Song)) }}">{{ $result->Song }}</a></td>
                            <td>{{ $result->Artist }}</td>
                            <td>{{ $result->Album }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="no-results">No results found.</p>
            @endif
        </div>
        @endif
    </div>
    <a href="{{ route('profile') }}" class="profile-icon">
        <i class="fas fa-user"></i>
    </a>
</body>
</html>
