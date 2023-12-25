<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    @extends('layout')
    @section('title', 'Home')
    @section('content')
    <style>
        .btn-pressed {
            background-color: #ff6347; /* Change this to your desired color */
        }

        /* Add a style for the banner image container */
        .banner-container {
            margin-top: 20px; /* Adjust the margin as needed */
            text-align: center;
        }

        /* Add a style for the banner image */
        .banner-image {
            width: 100%;
            max-height: 300px; /* Adjust the max-height as needed */
            object-fit: cover;
        }
    </style>
    <title>User Location</title>
</head>

<body class="bg-gray-100 font-sans">

    <!-- Banner Image Container -->
    <div class="banner-container">
        <!-- Add your image source and alt text -->
        <img class="banner-image" src="{{ asset('images/hero_image.jpg') }}" alt="Banner Image">
    </div>

    <div class="container mx-auto p-4">
        <div>
            <label for="latitude">Latitude:</label>
            <input type="text" id="latitude" placeholder="Enter Latitude">
        </div>
        <div>
            <label for="longitude">Longitude:</label>
            <input type="text" id="longitude" placeholder="Enter Longitude">
        </div>
        <button onclick="getLocation()" id="locationButton"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Get Location
        </button>

        <p id="demo" class="mt-4"></p>
        <div id="postalCode" class="mt-2"></div>
    </div>

    <script>
        // Your JavaScript code here
    </script>

    @endsection

</body>

</html>
