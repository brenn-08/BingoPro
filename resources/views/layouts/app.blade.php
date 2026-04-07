<!DOCTYPE html>
<html>
<head>
    <title>Bingo Pro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
    @include('layouts.header')
    <main class="container mx-auto py-8">
        @yield('content')
    </main>
    @include('layouts.footer')
</body>
</html>