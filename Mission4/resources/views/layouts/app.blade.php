<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My App')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class=" text-gray-800 min-h-screen flex flex-col">

    <!-- Main Content -->
    <main class="flex-1">
        <div class="container mx-auto px-6 py-8">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 text-center py-4">
        <p>&copy; {{ date('Y') }} All rights reserved.</p>
    </footer>
</body>
</html>
