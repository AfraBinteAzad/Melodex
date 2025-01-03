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
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            background-color: #f2f2f2; 
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
            max-width: 1000px; 
            text-align: center;
            z-index: 1;
        }

        h1 {
            margin-bottom: 20px;
        }

        .package-container {
            display: flex;
            justify-content: space-between;
            gap: 20px; 
            flex-wrap: wrap; 
        }

        .package {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            width: 280px; 
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .package:hover {
            transform: translateY(-10px); 
        }

        .package h3 {
            margin: 10px 0;
        }

        .sub-btn {
            background-color: #66128e;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-transform: uppercase;
            width: 100%;
        }

        .sub-btn:hover {
            background-color: #be7fdb;
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
    </video>

    <div class="container">
        <h1>Subscription Packages</h1>

        @if(count($packages) > 0)
            <div class="package-container">
                @foreach($packages as $package)
                    <div class="package">
                        <h3>{{ $package->Name }}</h3>
                        <p class="monthly rate">৳ {{ $package->Rate }}/month</p>
                        <p class="description">{{ $package->Description }}</p>
                        <button class="sub-btn">Subscribe</button>
                    </div>
                @endforeach
            </div>
        @else
            <p>No subscription packages available at the moment.</p>
        @endif
    </div>
    
    <a href="{{ route('dashboard') }}" class="dash-icon">
        <i class="fas fa-home"></i>
    </a>
</body>
</html>
