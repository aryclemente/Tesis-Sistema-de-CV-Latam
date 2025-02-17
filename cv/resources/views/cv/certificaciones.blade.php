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
            <div class="flex-1 flex justify-center items-start p-5">

                <!-- Formulario centrado con borde alineado -->
                <div class="w-full max-w-2xl bg-white p-10 rounded-lg shadow-lg space-y-8">

                    <!-- Título -->
                    <h2 class="text-3xl font-bold text-center text-blue-600 mb-8">Registrar Certificación</h2>

                    <!-- Formulario -->
                    <form action="{{ route('certificaciones.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Institución -->
                        <div class="relative">
                            <label for="institucion" class="block text-lg font-medium text-gray-800">Institución</label>
                            <input type="text" name="institucion" id="institucion" required class="mt-2 p-4 w-full rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 transition duration-300 shadow-lg hover:border-blue-600" placeholder="Nombre de la institución">
                        </div>

                        <!-- Nombre del Certificado -->
                        <div class="relative">
                            <label for="nombre_certificado" class="block text-lg font-medium text-gray-800">Nombre del Certificado</label>
                            <input type="text" name="nombre_certificado" id="nombre_certificado" required class="mt-2 p-4 w-full rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 transition duration-300 shadow-lg hover:border-blue-600" placeholder="Nombre del certificado">
                        </div>

                        <!-- Fecha de Expedición -->
                        <div class="relative">
                            <label for="fecha_expedicion" class="block text-lg font-medium text-gray-800">Fecha de Expedición</label>
                            <input type="date" name="fecha_expedicion" id="fecha_expedicion" required
                                   class="mt-2 p-4 w-full rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 transition duration-300 shadow-lg hover:border-blue-600"
                                   max="{{ \Carbon\Carbon::now('America/Caracas')->format('Y-m-d') }}">
                        </div>




                        <!-- Botón de Enviar -->
                        <div class="flex justify-center mt-6">
                            <button type="submit" class="bg-blue-600 text-white py-3 px-12 rounded-full hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition duration-300 transform hover:scale-105">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
