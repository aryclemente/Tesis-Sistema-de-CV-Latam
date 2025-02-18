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
            <!-- Tarjeta de formulario -->
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-3xl mx-auto">

                <!-- Título centrado -->
                <h2 class="text-3xl font-bold text-blue-600 text-center mb-6">Registrar Experiencia Laboral</h2>

                <form action="{{ route('cv.experiencia.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-2 gap-6">

                        <!-- Empresa -->
                        <div class="col-span-2">
                            <label for="empresa" class="block text-gray-700 font-semibold mb-1">Empresa:</label>
                            <input type="text" name="empresa" id="empresa" required
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 transition @error('empresa') border-red-500 @enderror">
                            @error('empresa')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Cargo -->
                        <div class="col-span-2">
                            <label for="cargo" class="block text-gray-700 font-semibold mb-1">Cargo:</label>
                            <textarea name="cargo" id="cargo" required
                                class="w-full p-3 border rounded-lg h-24 resize-none focus:ring-2 focus:ring-blue-400 transition @error('cargo') border-red-500 @enderror"></textarea>
                            @error('cargo')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fecha de inicio -->
                        <div>
                            <label for="fecha_inicio" class="block text-gray-700 font-semibold mb-1">Fecha Inicio:</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" required
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 transition @error('fecha_inicio') border-red-500 @enderror"
                                max="{{ \Carbon\Carbon::now('America/Caracas')->format('Y-m-d') }}">
                            @error('fecha_inicio')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fecha de fin -->
                        <div>
                            <label for="fecha_fin" class="block text-gray-700 font-semibold mb-1">Fecha Fin:</label>
                            <input type="date" name="fecha_fin" id="fecha_fin" required
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 transition @error('fecha_fin') border-red-500 @enderror"
                                max="{{ \Carbon\Carbon::now('America/Caracas')->format('Y-m-d') }}">
                            @error('fecha_fin')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Habilidades -->
                        <div class="col-span-2">
                            <label for="habilidades" class="block text-gray-700 font-semibold mb-1">Habilidades:</label>
                            <input type="text" name="habilidades" id="habilidades" required
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 transition @error('habilidades') border-red-500 @enderror"
                                placeholder="Ejemplo: Liderazgo, Trabajo en equipo, PHP">
                            @error('habilidades')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Botón de envío -->
                        <div class="col-span-2 flex justify-center mt-6">
                            <button type="submit"
                                class="bg-blue-600 text-white py-3 px-8 rounded-lg hover:bg-blue-700 transition shadow-md">
                                Guardar
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
</html>
