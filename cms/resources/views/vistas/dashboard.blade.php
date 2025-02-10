<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body class="font-inter bg-gray-100">

    <div class="flex h-screen">
        @if (session('show_message'))
        <x-mensaje :message="session('show_message')" />
        @php
            session()->forget('show_message');
        @endphp
       @endif
       @auth

        <div class="flex h-screen">
            <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
                <x-side-menu />
            </div>

            <div class="flex-1 flex flex-col">
                @auth
                    <div class="flex items-center space-x-4 mb-12">
                        <x-profile />
                    </div>

                    <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="bg-green-800 text-white p-8 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                            <h2 class="text-3xl font-bold mb-4">Cantidad de Páginas</h2>
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center space-x-4">
                                    <i class="fas fa-file-alt fa-2x"></i>
                                    <span class="text-lg font-medium">Total Páginas</span>
                                </div>
                                <div class="text-4xl font-semibold">{{ $pagesCount }}</div>
                            </div>
                            <div class="h-1 w-16 bg-gray-200 mb-6"></div>
                            <p class="text-lg">Total de páginas creadas en la plataforma, actualizándose conforme se añaden nuevas.</p>

                        </div>

                        <div
                            class="bg-gray-800 text-white p-8 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                            <h2 class="text-3xl font-bold mb-4">Cantidad de Publicaciones</h2>
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center space-x-4">
                                    <i class="fas fa-newspaper fa-2x"></i>
                                    <span class="text-lg font-medium">Total Publicaciones</span>
                                </div>
                                <div class="text-4xl font-semibold">{{ $publicationCount }}</div>
                            </div>
                            <div class="h-1 w-16 bg-gray-200 mb-6"></div>
                            <p class="text-lg">Total de publicaciones activas en la plataforma, actualizándose conforme se
                                añaden nuevas.
                            </p>
                            <a href="{{ route('posts.lista') }}">
                                <button class="mt-4 bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600">
                                    Ver Todas las publicaciones
                                </button>
                            </a>

                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
    @endauth
</body>

</html>
