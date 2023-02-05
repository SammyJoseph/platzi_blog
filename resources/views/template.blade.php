<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyecto Blog</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
</head>

<body class="p-3">
    <div class="container px-4 mx-auto">
        <header class="flex justify-between items-center py-4">
            <div class="flex items-center flex-grow gap-4">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/elephant.png') }}" class="h-12">
                </a>
                <form action="{{ route('home') }}" method="GET" class="flex-grow">
                    <input type="text" name="search" placeholder="Buscar..." class="border border-gray-200 rounded py-2 px-4 w-1/2">
                </form>
            </div>

            @auth
                {{-- ruta al dashboard --}}
                <a class="border-b-2" href="{{ route('dashboard') }}">Dashboard</a>
            @else
                {{-- ruta al login --}}
                <a class="border-b-2" href="{{ route('login') }}">Login</a>
            @endauth
        </header>

        <div class="opacity-60 h-px mb-8" style="
            background: linear-gradient(to right,
                rgba(200, 200, 200, 0) 0%,
                rgba(200, 200, 200, 1) 30%,
                rgba(200, 200, 200, 1) 70%,
                rgba(200, 200, 200, 0) 100%
            ">

        </div>

        @yield('contenido')

        <p class="py-16">
            <img src="{{ asset('images/elephant.png') }}" class="h-12 mx-auto">
        </p>
    </div>
</body>
</html>
