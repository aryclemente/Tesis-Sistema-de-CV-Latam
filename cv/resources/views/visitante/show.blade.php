<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->title }}</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen bg-gradient-to-br from-pink-300 via-purple-300 to-blue-400 text-gray-800">

    <!-- Navbar -->
    <x-navbar />

    <!-- Contenido Principal -->
    <div class="container mx-auto py-12 px-6 flex-grow text-center">
        <!-- Título y Descripción -->
        <div class="mb-8">
            <h1 class="text-5xl font-extrabold text-gray-900 mb-4 animate-bounce">
                {{ $page->title }}
            </h1>
            <p class="text-lg text-gray-700 italic">
                {{ $page->description }}
            </p>
        </div>

        <!-- Cuadro de Contenido -->
        <div class="bg-white shadow-lg rounded-xl p-6 border-4 border-purple-500 w-full max-w-3xl mx-auto transform hover:scale-105 transition duration-300">
            <div class="prose max-w-none text-gray-800 overflow-auto max-h-96">
                {!! $page->content !!}
            </div>
        </div>
    </div>

    <!-- Footer Fijo -->
    <x-footer class="bg-gray-900 text-white text-center py-4 mt-auto fixed bottom-0 w-full">
        🌟 Gracias por visitarnos 🌟
    </x-footer>
</body>
</html>
