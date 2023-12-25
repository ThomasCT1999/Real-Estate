<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Tailwind Project')</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>

<body class="font-sans bg-gray-100">

    <nav class="bg-gray-500 p-4 text-white">
        <div class="container mx-auto">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <a href="{{ route('about') }}" class="hover:underline ml-4">About</a>
            <a href="{{ route('contact') }}" class="hover:underline ml-4">Contact</a>
        </div>
    </nav>

    <div class="container mx-auto p-4">
        @yield('content')
    </div>

</body>

</html>
