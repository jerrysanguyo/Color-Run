<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="icon" type="image/webp" href="{{ asset('images/city_logo.webp') }}">
    @stack('styles')
</head>

<body class="bg-cover bg-center bg-no-repeat min-h-screen flex items-center justify-center"
    style="background-image: url('{{ asset('images/cover.webp') }}');">

    @yield('content')

    @stack('scripts')
</body>

</html>