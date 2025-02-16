<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="font-inter bg-gray-50">

    <div class="flex h-screen">
        @if (session('show_message'))
        <x-mensaje :message="session('show_message')" />
        @php
            session()->forget('show_message');
        @endphp
       @endif
        <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
            <x-side-menu />
        </div>

        <div class="flex-1 flex flex-col">
            @auth
                <div class="flex items-center space-x-4 mb-12">
                    <x-profile />
                </div>
                <div class="container mx-auto p-6">
                    <h1 class="text-3xl font-bold mb-4">Crear Usuario</h1>

                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <!-- Nombre -->
                        <div class="mb-4">
                            <label for="first_name" class="block text-gray-700">Nombre</label>
                            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"
                                   oninput="validateNameInput(this)"
                                   class="w-full px-4 py-2 border rounded-lg @error('first_name') border-red-500 @enderror">
                            @error('first_name')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Apellido -->
                        <div class="mb-4">
                            <label for="last_name" class="block text-gray-700">Apellido</label>
                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
                                   oninput="validateNameInput(this)"
                                   class="w-full px-4 py-2 border rounded-lg @error('last_name') border-red-500 @enderror">
                            @error('last_name')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="date_of_birth" class="block text-gray-700">Fecha de Nacimiento</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}"
                                   class="w-full px-4 py-2 border rounded-lg @error('date_of_birth') border-red-500 @enderror"
                                    max="{{ now()->subYears(18)->toDateString() }}" min="{{ now()->subYears(124)->toDateString() }}"
                                   onchange="checkAge(this)">
                            @error('date_of_birth')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Cédula -->
                        <div class="mb-4">
                            <label for="cedula" class="block text-gray-700">Cédula</label>
                            <input type="text" name="cedula" id="cedula" value="{{ old('cedula') }}"
                                   class="w-full px-4 py-2 border rounded-lg @error('cedula') border-red-500 @enderror"
                                   oninput="validateCedula(event)"
                                   maxlength="10">
                            @error('cedula')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nombre de usuario -->
                        <div class="mb-4">
                            <label for="user_name" class="block text-gray-700">Nombre de Usuario</label>
                            <input type="text" name="user_name" id="user_name" value="{{ old('user_name') }}" class="w-full px-4 py-2 border rounded-lg @error('user_name') border-red-500 @enderror">
                            @error('user_name')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Dirección -->
                        <div class="mb-4">
                            <label for="address" class="block text-gray-700">Dirección</label>
                            <input type="text" name="address" id="address" value="{{ old('address') }}" class="w-full px-4 py-2 border rounded-lg @error('address') border-red-500 @enderror">
                            @error('address')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full px-4 py-2 border rounded-lg @error('email') border-red-500 @enderror">
                            @error('email')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Contraseña -->
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700">Contraseña</label>
                            <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-lg @error('password') border-red-500 @enderror">
                            @error('password')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nacionalidad -->
                        <div class="mb-4">
                            <label for="nacionalidad_idnacionalidad" class="block text-gray-700">Nacionalidad</label>
                            <select name="nacionalidad_idnacionalidad" id="nacionalidad_idnacionalidad" class="w-full px-4 py-2 border rounded-lg @error('nacionalidad_idnacionalidad') border-red-500 @enderror">
                                @foreach($nacionalidades as $nacionalidad)
                                    <option value="{{ $nacionalidad->idnacionalidad }}" {{ old('nacionalidad_idnacionalidad') == $nacionalidad->idnacionalidad ? 'selected' : '' }}>{{ $nacionalidad->nacionalidad }}</option>
                                @endforeach
                            </select>
                            @error('nacionalidad_idnacionalidad')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Rol -->
                        <div class="mb-4">
                            <label for="roles_idroles" class="block text-gray-700">Rol</label>
                            <select name="roles_idroles" id="roles_idroles" class="w-full px-4 py-2 border rounded-lg @error('roles_idroles') border-red-500 @enderror">
                                @foreach($roles as $rol)
                                    <option value="{{ $rol->idroles }}" {{ old('roles_idroles') == $rol->idroles ? 'selected' : '' }}>{{ $rol->name }}</option>
                                @endforeach
                            </select>
                            @error('roles_idroles')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botones -->
                        <div class="mb-4 flex space-x-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Crear Usuario</button>
                            <a href="{{ route('users.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Volver a la lista</a>
                        </div>
                    </form>
                    <script>
                        // Función para permitir solo letras y espacios en los campos de nombre y apellido
                        function validateNameInput(input) {
                            // Reemplazar cualquier carácter que no sea letra o espacio
                            input.value = input.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
                        }

                            function checkAge(input) {
                            const selectedDate = new Date(input.value);
                            const currentDate = new Date();

                            const age = currentDate.getFullYear() - selectedDate.getFullYear();
                            const month = currentDate.getMonth() - selectedDate.getMonth();
                            const day = currentDate.getDate() - selectedDate.getDate();

                            if (age < 18 || (age === 18 && (month < 0 || (month === 0 && day < 0)))) {
                                alert("Debes tener al menos 18 años para registrarte.");
                                input.setCustomValidity("Debes tener al menos 18 años para registrarte.");
                            } else {
                                input.setCustomValidity("");
                            }
                        }

                      // Función para validar la cédula
    function validateCedula(event) {
        const input = event.target;

        // Eliminar caracteres no numéricos
        input.value = input.value.replace(/[^0-9]/g, '');

        // Si la cédula es menor o igual a 0, limpiamos el valor
        if (parseInt(input.value) <= 0) {
            input.value = '';
        }
    }
                    </script>

                </div>
            @endauth
        </div>
    </div>

</body>

</html>
