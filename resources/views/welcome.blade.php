<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <style>
        .btn-pressed {
            background-color: #ff6347; /* Change this to your desired color */
        }
    </style>
    <title>User Location</title>
</head>
<body class="bg-gray-100 font-sans">

<div class="container mx-auto p-4">
    <button onclick="getLocation()" id="locationButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Get Location
    </button>

    <p id="demo" class="mt-4"></p>
</div>

<script>
    function getLocation() {
        var locationButton = document.getElementById("locationButton");

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
            locationButton.classList.add("btn-pressed");
        } else {
            document.getElementById("demo").innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

        document.getElementById("demo").innerHTML = `
            <strong>Latitude:</strong> ${latitude}<br>
            <strong>Longitude:</strong> ${longitude}
        `;

        // You can use the obtained coordinates to display the user's location on a map or perform other actions.
    }

    function showError(error) {
        var locationButton = document.getElementById("locationButton");

        switch(error.code) {
            case error.PERMISSION_DENIED:
                document.getElementById("demo").innerHTML = "User denied the request for Geolocation.";
                break;
            case error.POSITION_UNAVAILABLE:
                document.getElementById("demo").innerHTML = "Location information is unavailable.";
                break;
            case error.TIMEOUT:
                document.getElementById("demo").innerHTML = "The request to get user location timed out.";
                break;
            case error.UNKNOWN_ERROR:
                document.getElementById("demo").innerHTML = "An unknown error occurred.";
                break;
        }

        // Remove the pressed style on error
        locationButton.classList.remove("btn-pressed");
    }
</script>

</body>
</html>
