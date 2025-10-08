<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Authentication' }} — DocuNest</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex flex-col justify-center items-center">
    <div id="app" class="w-full max-w-md bg-white shadow-lg rounded-2xl p-8">
        <div class="mb-6 text-center">
            <a href="/" class="inline-flex items-center space-x-2">
                <img src="/logo.svg" alt="Logo" class="h-8 w-8">
                <span class="font-bold text-xl text-gray-800">DocuNest</span>
            </a>
        </div>
        @yield('content')
    </div>

    <footer class="mt-6 text-sm text-gray-500">
        &copy; {{ date('Y') }} DocuNest. All rights reserved.
    </footer>
</body>
</html>