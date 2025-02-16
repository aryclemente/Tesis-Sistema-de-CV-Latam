<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body class="font-inter bg-gray-50">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 h-full bg-gray-800 text-white transition-transform lg:block fixed z-10">
            <x-side-menu />
        </div>

        <div class="flex-1 flex flex-col bg-gray-100 lg:pl-64 pl-0">

            <div class="flex items-center">
                <x-profile />
            </div>

            <main class="p-4 space-y-6">
                <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg grid grid-cols-1 md:grid-cols-2 gap-8">
                    <h1 class="text-3xl font-bold mb-4 col-span-2">Editar Publicación</h1>
                    <form action="{{ route('publications.update', ['id' => $publication->idpublications]) }}"
                        method="POST" enctype="multipart/form-data" class="col-span-2">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">Título</label>
                            <input type="text" name="title" id="title" value="{{ $publication->title }}"
                                class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-gray-700">Contenido</label>
                            <textarea name="content" id="content" class="summernote w-full px-4 py-2 border rounded-lg" required>{{ $publication->content }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="fecha_publicacion" class="block text-gray-700">Fecha de Publicación</label>
                            <input type="datetime-local" name="fecha_publicacion" id="fecha_publicacion"
                                value="{{ $publication->fecha_publicacion ? $publication->fecha_publicacion->format('Y-m-d') : '' }}"
                                class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="estado" class="block text-gray-700">Estado</label>
                            <select name="estado" id="estado" class="w-full px-4 py-2 border rounded-lg" required>
                                <option value="borrador" {{ $publication->estado == 'borrador' ? 'selected' : '' }}>
                                    Borrador</option>
                                <option value="publicado" {{ $publication->estado == 'publicado' ? 'selected' : '' }}>
                                    Publicado</option>
                                <option value="programado" {{ $publication->estado == 'programado' ? 'selected' : '' }}>
                                    Programado</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="categoria" class="block text-gray-700">Categoría</label>
                            <input type="text" name="categoria" id="categoria" value="{{ $publication->categoria }}"
                                class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700">Imagen</label>
                            <input type="file" name="image" id="image"
                                class="w-full px-4 py-2 border rounded-lg">
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Actualizar
                                Publicación</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300
            });
        });
    </script>
</body>

</html>
