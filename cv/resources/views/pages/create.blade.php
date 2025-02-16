<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Crear Página</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
</head>

<body class="font-inter bg-gray-50">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
            <x-side-menu />
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Profile Section -->
            <div class="flex items-center space-x-4 mb-12">
                <x-profile />
            </div>

            <!-- Page Form -->
            <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg">
                <h1 class="text-3xl font-bold mb-4">Crear Página</h1>

                <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700">Título</label>
                        <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded-lg" required>
                    </div>

                    <!-- Slug -->
                    <div class="mb-4">
                        <label for="slug" class="block text-gray-700">Slug</label>
                        <div class="flex items-center">
                            <span class="text-gray-600">http://127.0.0.1:800/</span>
                            <input type="text" name="slug" id="slug" class="flex-1 px-4 py-2 border rounded-lg" readonly>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700">Descripción</label>
                        <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border rounded-lg" required></textarea>
                    </div>

                    <!-- Content -->
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700">Contenido</label>
                        <div class="border border-gray-300 rounded-lg overflow-hidden">
                            <textarea name="content" id="content" class="summernote"></textarea>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700">Estado</label>
                        <select name="status" id="status" class="w-full px-4 py-2 border rounded-lg" required>
                            <option value="draft">Borrador</option>
                            <option value="published">Publicado</option>
                            <option value="archived">Archivado</option>
                        </select>
                    </div>

                    <!-- Actions -->
                    <div class="mb-4 flex space-x-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Crear Página</button>
                        <a href="{{ route('pages.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Volver a la lista</a>
                    </div>

                    <!-- Scripts -->
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
                    <script>
                        $(document).ready(function () {
                            // Inicializar Summernote
                            $('.summernote').summernote({
                                height: 300,
                                lang: 'es-ES',
                                placeholder: 'Escribe el contenido de la página aquí...',
                                toolbar: [
                                    ['style', ['style']],
                                    ['font', ['bold', 'italic', 'underline', 'clear']],
                                    ['para', ['ul', 'ol', 'paragraph']],
                                    ['insert', ['link', 'picture', 'video']],
                                    ['view', ['fullscreen', 'codeview', 'help']],
                                ],
                            });

                            // Mostrar/ocultar campo de fecha según el estado
                            $('#status').on('change', function () {
                                const status = $(this).val();
                                const fechaWrapper = $('#fecha_publicacion_wrapper');
                                const fechaField = $('#fecha_publicacion');

                                if (status === 'published') {
                                    fechaWrapper.show();
                                    fechaField.prop('required', true);
                                } else {
                                    fechaWrapper.hide();
                                    fechaField.prop('required', false).val(''); // Ocultar y limpiar valor
                                }
                            });

                            // Validar la fecha de publicación futura

                        });
                    </script>
                </form>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const titleInput = document.getElementById('title');
                        const slugInput = document.getElementById('slug');
                        const urlPrefix = "https://example.com/";

                        titleInput.addEventListener('input', function () {
                            const slug = titleInput.value
                                .toLowerCase()
                                .trim()
                                .replace(/[^a-z0-9\s-]/g, '') // Remueve caracteres no permitidos
                                .replace(/\s+/g, '-')         // Reemplaza espacios por guiones
                                .replace(/-+/g, '-');         // Remueve guiones repetidos
                            slugInput.value = slug;
                        });

                        slugInput.addEventListener('input', function () {
                            if (!slugInput.value.startsWith(urlPrefix)) {
                                slugInput.value = urlPrefix + slugInput.value;
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</body>

</html>
