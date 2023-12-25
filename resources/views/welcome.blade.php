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
            text-align: center;
        }

        /* Add a style for the banner image */
        .banner-image {
            width: 100%;
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
    function getLocation() {
        var locationButton = document.getElementById("locationButton");
        var latitudeInput = document.getElementById("latitude");
        var longitudeInput = document.getElementById("longitude");
        // Check if latitude and longitude inputs are not empty
        if (latitudeInput.value && longitudeInput.value) {
            const latitude = parseFloat(latitudeInput.value);
            const longitude = parseFloat(longitudeInput.value);
            document.getElementById("demo").innerHTML = `
                <strong>Latitude:</strong> ${latitude}<br>
                <strong>Longitude:</strong> ${longitude}
            `;
            const apiUrl = `https://api.postcodes.io/postcodes?lon=${longitude}&lat=${latitude}`;
            console.log('API URL:', apiUrl);
            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    displayPostalCode(data);
                })
                .catch(error => {
                    console.error('Error fetching postal code data:', error);
                    document.getElementById("postalCode").innerHTML = "Error fetching postal code data. See console for details.";
                });
        } else {
            document.getElementById("demo").innerHTML = "Please enter both latitude and longitude.";
        }
    }
    function displayPostalCode(data) {
        const postalCodeElement = document.getElementById("postalCode");
        // Log the entire data object
        console.log("Full API Response:", data);
        // Check if data.result is not null and is an array
        if (data.result && Array.isArray(data.result) && data.result.length > 0) {
            // Create a string with information for each result
            const resultsString = data.result.map(result => {
                return `<strong>postcode:</strong> ${result.postcode}<br>`;
            }).join('');
            postalCodeElement.innerHTML = resultsString;
        } else {
            postalCodeElement.innerHTML = "Postal code data not available.";
        }
    }
    </script>

    @endsection

</body>

</html>
