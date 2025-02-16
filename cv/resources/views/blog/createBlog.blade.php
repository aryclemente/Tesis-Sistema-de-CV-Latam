<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Publicación</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body class="font-inter bg-gray-50">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
            <x-side-menu />
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col bg-gray-100 lg:pl-64 pl-0">
            <!-- Header -->
            <div class="flex items-center">
                <x-profile />
            </div>

            <main class="p-8 space-y-6 bg-gray-50">
                <!-- Formulario Principal -->
                <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg grid grid-cols-1 md:grid-cols-2 gap-8">
                    <h1 class="text-3xl font-semibold text-gray-800 mb-6 col-span-2 text-center">Crear Publicación</h1>
                    <!-- Formulario -->
                    <form action="{{ route('publications.store') }}" method="POST" enctype="multipart/form-data" class="col-span-2">
                        @csrf
                        <!-- Título -->
                        <div class="mb-6">
                            <label for="title" class="block text-gray-700 font-medium">Título</label>
                            <input type="text" name="title" id="title"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500
                                @error('title') border-red-500 @enderror"
                                placeholder="Ingresa el título de la publicación" value="{{ old('title') }}" required>

                            @error('title')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Contenido -->
                        <div class="mb-6">
                            <label for="content" class="block text-gray-700 font-medium">Contenido</label>
                            <textarea name="content" id="content" class="summernote w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Escribe el contenido de la publicación">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Fecha de Publicación -->
                        <div class="mb-6">
                            <label for="fecha_publicacion" class="block text-gray-700 font-medium">Fecha de Publicación</label>
                            <input type="date" name="fecha_publicacion" id="fecha_publicacion" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('fecha_publicacion') }}" required>
                            @error('fecha_publicacion')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                let estadoSelect = document.getElementById('estado');
                                let fechaInput = document.getElementById('fecha_publicacion');

                                // Función para actualizar el atributo 'min' de la fecha
                                function updateFechaLimit() {
                                    let currentDate = new Date();
                                    let year = currentDate.getFullYear();
                                    let month = String(currentDate.getMonth() + 1).padStart(2, '0');
                                    let day = String(currentDate.getDate()).padStart(2, '0');
                                    let hours = String(currentDate.getHours()).padStart(2, '0');
                                    let minutes = String(currentDate.getMinutes()).padStart(2, '0');
                                    let currentDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;

                                    // Si el estado es "programado", se permite una fecha futura
                                    if (estadoSelect.value === 'programado') {
                                        fechaInput.removeAttribute('min'); // Permitir cualquier fecha futura
                                    } else {
                                        // Si el estado es "borrador" o "publicado", solo se puede seleccionar la fecha actual o pasada
                                        fechaInput.setAttribute('min', currentDateTime); // Restringir fecha a la actual
                                    }
                                }

                                // Actualizar la fecha cuando el estado cambia
                                estadoSelect.addEventListener('change', updateFechaLimit);

                                // Inicializar con el valor correcto al cargar la página
                                updateFechaLimit();
                            });
                        </script>
                        <!-- Estado -->
                        <div class="mb-6">
                            <label for="estado" class="block text-gray-700 font-medium">Estado</label>
                            <select name="estado" id="estado" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('estado') border-red-500 @enderror" required>
                                <option value="borrador" @if(old('estado') == 'borrador') selected @endif>Borrador</option>
                                <option value="publicado" @if(old('estado') == 'publicado') selected @endif>Publicado</option>
                                <option value="programado" @if(old('estado') == 'programado') selected @endif>Programado</option>
                            </select>

                            @error('estado')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Categoría -->
                        <div class="mb-6">
                            <label for="categoria" class="block text-gray-700 font-medium">Categoría</label>
                            <input type="text" name="categoria" id="categoria"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('categoria') border-red-500 @enderror" value="{{ old('categoria') }}" required
                                placeholder="Ingresa la categoría de la publicación">

                            @error('categoria')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Imagen -->
                        <div class="mb-6">
                            <label for="image" class="block text-gray-700 font-medium">Imagen</label>
                            <input type="file" name="image" id="image"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                            @error('image')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botón de Enviar -->
                        <div class="mb-6">
                            <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                                Crear Publicación
                            </button>
                        </div>

                         <!-- Scripts -->
                        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

                        <script>
                            $(document).ready(function () {
    // Inicializar Summernote
    $('.summernote').summernote({
        height: 300, // Altura del editor
        callbacks: {
            onImageUpload: function (files) {
                if (files.length) {
                    uploadImage(files[0]); // Subir la primera imagen seleccionada
                }
            }
        }
    });

    // Función para subir la imagen
    function uploadImage(file) {
        let formData = new FormData();
        formData.append('image', file); // El nombre del campo debe coincidir con el backend

        $.ajax({
            url: '{{ route("upload.image") }}', // Ruta a tu controlador de subida
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Protege la solicitud con el token CSRF
            },
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                // Insertar la imagen en el editor usando la URL devuelta
                $('.summernote').summernote('insertImage', response.url);
            },
            error: function (xhr) {
                console.error("Error al subir la imagen:", xhr.responseText);
                alert('Hubo un error al subir la imagen.');
            }
        });
    }
});

                        </script>
                    </form>
                </div>
            </main>

        </div>
    </div>

</body>

</html>
