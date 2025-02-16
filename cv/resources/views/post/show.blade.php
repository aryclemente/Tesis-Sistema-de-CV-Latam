<!-- resources/views/post/show.blade.php -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de la Publicación</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-inter bg-gray-100">
    <div class="flex h-screen">
        <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
            <x-side-menu />
        </div>

        <div class="flex-1 flex flex-col">
            <div class="flex items-center space-x-4 mb-12">
                <x-profile />
            </div>

            <div class="container mx-auto p-8 bg-white rounded-lg shadow-lg">
                <!-- Título de la publicación -->
                <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $publication->title }}</h1>

                <!-- Imagen de la publicación (si existe) -->
                @if($publication->image)
                    <div class="mb-6">
                        <img src="{{ asset('storage/'.$publication->image) }}" alt="Imagen de publicación" class="w-full h-auto rounded-lg shadow-md">
                    </div>
                @endif

                <!-- Detalles de la publicación -->
                <div class="text-gray-700 mb-4">
                    <p><strong>Contenido:</strong></p>
                    <p class="mb-4">{{ $publication->content }}</p>

                    <p><strong>Categoría:</strong> {{ $publication->categoria }}</p>
                    <p><strong>Estado:</strong>
                        <span class="text-sm font-semibold
                        @if($publication->estado == 'publicado') text-green-500
                        @elseif($publication->estado == 'borrador') text-yellow-500
                        @elseif($publication->estado == 'programado') text-blue-500
                        @else text-gray-500 @endif">
                            {{ ucfirst($publication->estado) }}
                        </span>
                    </p>
                    <p><strong>Fecha de publicación:</strong> {{ $publication->fecha_publicacion->format('d/m/Y H:i') }}</p>
                </div>

                <!-- Autor de la publicación -->
                <div class="mb-6">
                    <p><strong>Publicado por:</strong> {{ $publication->user->first_name }} {{ $publication->user->last_name }}</p>
                </div>

                <!-- Enlace para editar la publicación -->
                <div class="mb-6">
                    <a href="{{ route('posts.edit', $publication->idpublications) }}" class="text-blue-600 hover:underline">Editar publicación</a>
                </div>

                <!-- Formulario para eliminar la publicación -->
                <div class="mb-6">
                    <form action="{{ route('posts.destroy', $publication->idpublications) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Eliminar publicación</button>
                    </form>
                </div>

                <!-- Enlace para volver a la lista de publicaciones -->
                <a href="{{ route('posts.lista') }}" class="text-blue-600 hover:underline">Volver a la lista</a>
            </div>
        </div>
    </div>
</body>

</html>
