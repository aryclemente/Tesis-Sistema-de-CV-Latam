<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Publicación</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body class="font-sans bg-gray-100">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 h-full bg-gray-800 text-white transition-transform lg:block fixed z-10">
            <x-side-menu />
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col bg-gray-100 lg:pl-64 pl-0">

            <!-- Profile Bar -->
            <div class="flex items-center">
                <x-profile />
            </div>


            <main class="p-8 space-y-6">
                <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
                    <!-- Title -->
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">Titulo: {{ $publication->title }}</h1>

                    <!-- Content -->
                    <p class="text-3xl font-bold mb-4">Contenido:</p>
                    <p class="text-gray-700 mb-4">{!! $publication->content !!}</p>

                    <!-- Publication Date -->
                    <p class="text-gray-600 mb-4"><strong>Fecha de Publicación:</strong>
                        {{ $publication->fecha_publicacion->format('Y-m-d H:i:s') }}</p>

                    <!-- Status -->
                    <p class="text-gray-600 mb-4"><strong>Estado:</strong>
                        <span class="capitalize text-indigo-500">{{ ucfirst($publication->estado) }}</span>
                    </p>

                    <!-- Category -->
                    <p class="text-gray-600 mb-4"><strong>Categoría:</strong> {{ $publication->categoria }}</p>

                    <!-- Image (with fixed box size) -->
                    @if ($publication->image)
                        <div class="relative mb-4 w-full h-80 overflow-hidden rounded-lg">
                            <img src="{{ asset('storage/' . $publication->image) }}" alt="Imagen de la publicación" class="w-full h-full object-cover">
                        </div>
                    @endif


                </div>
            </main>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
