<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Idiomas</title>
    <!-- TailwindCSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet"></script>
</head>
<body class="font-inter bg-gray-100">

    <div class="flex h-screen">
        <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
            <x-side-menu />
            <div class="flex-1 flex flex-col">
                <div class="flex items-center space-x-4 mb-6 px-6">
                    <x-profile />
                </div>
            </div>
        </div>

        <!-- Contenedor principal -->
        <div class="flex-1 flex flex-col p-5">
            <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">Seleccionar Idiomas</h2>

            <!-- Formulario con checkboxes -->
            <form action="{{ route('cv.idiomas.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-3 gap-6">

                    @foreach($idiomas as $idioma)
                        <div class="flex items-center space-x-4">
                            <!-- Checkbox para cada idioma -->
                            <input type="checkbox" name="idiomas[]" value="{{ $idioma->ididiomas }}" id="idioma_{{ $idioma->ididiomas }}" class="form-checkbox h-5 w-5 text-blue-600">
                            <label for="idioma_{{ $idioma->ididiomas }}" class="text-lg text-gray-800">{{ $idioma->idioma }} (Nivel: {{ $idioma->nivel }})</label>
                        </div>
                    @endforeach

                    <!-- Botón de envío -->
                    <div class="col-span-3 flex justify-center mt-6">
                        <button type="submit" class="bg-blue-600 text-white py-3 px-12 rounded-full hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition duration-300 transform hover:scale-105">
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
