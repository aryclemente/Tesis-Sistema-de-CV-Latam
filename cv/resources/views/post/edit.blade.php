<!-- resources/views/post/edit.blade.php -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Publicación</title>

    <!-- Agregar los archivos CSS de Summernote -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
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
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Editar Publicación: {{ $publication->title }}</h1>

                <!-- Formulario de edición -->
                <form method="POST" action="{{ route('posts.update', $publication->idpublications) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700">Título</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $publication->title) }}" class="w-full p-2 border border-gray-300 rounded-lg mt-2" required>
                    </div>

                    <!-- Cambiar el campo 'content' a Summernote -->
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700">Contenido</label>
                        <textarea name="content" id="content" rows="5" class="w-full p-2 border border-gray-300 rounded-lg mt-2" required>{{ old('content', $publication->content) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="categoria" class="block text-gray-700">Categoría</label>
                        <input type="text" name="categoria" id="categoria" value="{{ old('categoria', $publication->categoria) }}" class="w-full p-2 border border-gray-300 rounded-lg mt-2" required>
                    </div>

                    <div class="mb-4">
                        <label for="estado" class="block text-gray-700">Estado</label>
                        <select name="estado" id="estado" class="w-full p-2 border border-gray-300 rounded-lg mt-2">
                            <option value="publicado" {{ $publication->estado == 'publicado' ? 'selected' : '' }}>Publicado</option>
                            <option value="borrador" {{ $publication->estado == 'borrador' ? 'selected' : '' }}>Borrador</option>
                            <option value="programado" {{ $publication->estado == 'programado' ? 'selected' : '' }}>Programado</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-700">Imagen</label>
                        <input type="file" name="image" id="image" class="w-full p-2 border border-gray-300 rounded-lg mt-2">
                        @if($publication->image)
                            <img src="{{ asset('storage/'.$publication->image) }}" alt="Imagen de publicación" class="mt-4 w-32 h-32 object-cover">
                        @endif
                    </div>

                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Guardar cambios</button>
                </form>

                <a href="{{ route('posts.lista') }}" class="text-blue-600 hover:underline mt-4 block">Volver a la lista</a>
            </div>
        </div>
    </div>

    <!-- Inicializar Summernote -->
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                height: 200, // Ajustar el tamaño del área de texto
                placeholder: 'Escribe aquí el contenido de la publicación...',
                tabsize: 2
            });
        });
    </script>
</body>

</html>
