<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Certificación</title>
    <!-- Agrega TailwindCSS -->
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet"></script>
</head>
<body class="font-inter bg-gray-100">
    <div class="flex h-screen">

        <!-- Barra lateral -->
        <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
            <x-side-menu />
        </div>

        <!-- Contenedor principal -->
        <div class="flex-1 flex flex-col">
            <div class="flex items-center space-x-4 mb-6 px-6">
                <x-profile />
            </div>

            <!-- Contenedor para centrar el formulario, pero más arriba -->
            <div class="flex-1 flex flex-col p-8">
                <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">Registrar Estudios</h2>

                <form action="{{ route('cv.estudios.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                    @csrf

                    <!-- Estudios logrados -->
                    <div class="mb-4">
                        <label for="estudios_logrados" class="block text-lg font-medium text-gray-800">Estudios Logrados</label>
                        <input type="text" name="estudios_logrados" id="estudios_logrados" required class="mt-2 p-3 w-full border rounded-lg">
                    </div>

                    <!-- Nivel Académico -->
                    <div class="mb-4">
                        <label for="nivel_academico_id" class="block text-lg font-medium text-gray-800">Nivel Académico</label>
                        <select name="nivel_academico_id" id="nivel_academico_id" required class="mt-2 p-3 w-full border rounded-lg">
                            <option value="">Seleccione un nivel</option>
                            @foreach($nivelesAcademicos as $nivel)
                                <option value="{{ $nivel->idniveles_academicos }}">{{ $nivel->nivel_academico }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Mención -->
                    <div class="mb-4">
                        <label for="mencion_id" class="block text-lg font-medium text-gray-800">Mención</label>
                        <select name="mencion_id" id="mencion_id" required class="mt-2 p-3 w-full border rounded-lg">
                            <option value="">Seleccione una mención</option>
                            @foreach($menciones as $mencion)
                                <option value="{{ $mencion->idmenciones }}">{{ $mencion->tipo_mencion }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Botón de Enviar -->
                    <div class="flex justify-center mt-6">
                        <button type="submit" class="bg-blue-600 text-white py-3 px-12 rounded-full hover:bg-blue-700">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
