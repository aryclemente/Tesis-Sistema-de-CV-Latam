<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
            <div class="flex-1 flex flex-col">
                <div class="flex items-center space-x-4 mb-12">
                    <x-profile />
                </div>
            </div>

            <!-- Contenedor para centrar el formulario -->
            <div class="flex-1 flex items-center justify-center p-5">

                <!-- Formulario centrado -->
                <div class="w-full max-w-2xl bg-white p-10 rounded-lg shadow-lg space-y-8">

                    <!-- Título -->
                    <h2 class="text-3xl font-bold text-center text-blue-600 mb-8">Registrar Dirección</h2>

                    <!-- Formulario -->
                    <form action="{{ route('cv.direccion.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Estado -->
                        <div class="relative">
                            <label for="estado_id" class="block text-lg font-medium text-gray-800">Estado</label>
                            <select name="estado_id" id="estado_id" required class="mt-2 p-4 w-full rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 transition duration-300 shadow-lg hover:border-blue-600">
                                <option value="">Seleccione un estado</option>
                                @foreach($estados as $estado)
                                    <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Municipio -->
                        <div class="relative">
                            <label for="municipio_id" class="block text-lg font-medium text-gray-800">Municipio</label>
                            <select name="municipio_id" id="municipio_id" required class="mt-2 p-4 w-full rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 transition duration-300 shadow-lg hover:border-blue-600">
                                <option value="">Seleccione un municipio</option>
                            </select>
                        </div>

                        <!-- Parroquia -->
                        <div class="relative">
                            <label for="parroquia_id" class="block text-lg font-medium text-gray-800">Parroquia</label>
                            <select name="parroquia_id" id="parroquia_id" required class="mt-2 p-4 w-full rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 transition duration-300 shadow-lg hover:border-blue-600">
                                <option value="">Seleccione una parroquia</option>
                            </select>
                        </div>

                        <!-- Ciudad -->
                        <div class="relative">
                            <label for="ciudad_id" class="block text-lg font-medium text-gray-800">Ciudad</label>
                            <select name="ciudad_id" id="ciudad_id" required class="mt-2 p-4 w-full rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 transition duration-300 shadow-lg hover:border-blue-600">
                                <option value="">Seleccione una ciudad</option>
                            </select>
                        </div>

                        <!-- Dirección Detallada -->
                        <div class="relative">
                            <label for="direccion_detallada" class="block text-lg font-medium text-gray-800">Dirección Detallada</label>
                            <input type="text" name="direccion_detallada" required class="mt-2 p-4 w-full rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 transition duration-300 shadow-lg hover:border-blue-600" placeholder="Ingrese la dirección detallada">
                        </div>

                        <!-- Botón de envío -->
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

    <script>
        document.getElementById('estado_id').addEventListener('change', function () {
            fetch(`/cv/municipios/${this.value}`)
                .then(res => res.json())
                .then(data => {
                    let municipios = '<option value="">Seleccione un municipio</option>';
                    data.forEach(m => municipios += `<option value="${m.id}">${m.municipio}</option>`);
                    document.getElementById('municipio_id').innerHTML = municipios;
                });
        });

        document.getElementById('municipio_id').addEventListener('change', function () {
            fetch(`/cv/parroquias/${this.value}`)
                .then(res => res.json())
                .then(data => {
                    let parroquias = '<option value="">Seleccione una parroquia</option>';
                    data.forEach(p => parroquias += `<option value="${p.id}">${p.parroquia}</option>`);
                    document.getElementById('parroquia_id').innerHTML = parroquias;
                });
        });

        document.getElementById('estado_id').addEventListener('change', function () {
            fetch(`/cv/ciudades/${this.value}`)
                .then(res => res.json())
                .then(data => {
                    let ciudades = '<option value="">Seleccione una ciudad</option>';
                    data.forEach(c => ciudades += `<option value="${c.id}">${c.ciudad}</option>`);
                    document.getElementById('ciudad_id').innerHTML = ciudades;
                });
        });
    </script>

</body>
</html>
