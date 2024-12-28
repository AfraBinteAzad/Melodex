<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
        }

        table th, table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #66128e;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
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

        .actions button {
            width: auto;
            margin: 5px;
            font-size: 12px;
        }

        @media (max-width: 768px) {
            input {
                width: calc(100% - 20px);
            }

            table th, table td {
                font-size: 14px;
            }

            button {
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
        <h1>Welcome, Admin!</h1>

        <!-- Add Song Form -->
        <a href="{{ route('admin.add_song_page') }}">
            <button type="button">Add Song, Artist, Album</button>
        </a>

        <!-- Table of Songs -->
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Artist</th>
                    <th>Song</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($songs as $index => $song)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $song->Artist }}</td>
                        <td>{{ $song->Song }}</td>
                        <td class="actions">
                            <!-- Edit Song Form -->
                            <form action="{{ route('admin.edit_song') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $song->id }}">
                                <input type="text" name="artist" value="{{ $song->Artist }}" required>
                                <input type="text" name="song" value="{{ $song->Song }}" required>
                                <button type="submit">Edit</button>
                            </form>

                            <!-- Delete Song Form -->
                            <form action="{{ route('admin.delete_song') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $song->id }}">
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this song?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Logout -->
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
