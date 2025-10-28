<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="antialiased">

    <div class="min-h-screen bg-gray-100">
        {{-- Navbar can go here --}}
        <main class="p-6">
            @yield('content')
        </main>
    </div>

    @vite('resources/js/app.js')
</body>
</html>
