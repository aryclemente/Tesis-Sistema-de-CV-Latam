@extends('auth.layout')

@section('content')

<div class="min-h-screen bg-gradient-to-r from-cyan-500 to-sky-500 py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-sky-500 shadow-xl transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
        <div class="relative px-6 py-10 bg-white shadow-xl sm:rounded-3xl sm:p-16">
            <form action="{{ route('login.verify') }}" method="POST">
                @csrf
                <div class="max-w-md mx-auto">
                    <div class="text-center mb-6">
                        <h1 class="text-4xl font-semibold text-gray-800">Iniciar sesión</h1>
                    </div>

                    @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6" role="alert">
                        <strong class="font-bold">¡Éxito!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @error('invalid_credentials')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6" role="alert">
                        <strong class="font-bold">Error:</strong>
                        <span class="block sm:inline">{{ $message }}</span>
                        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror

                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <div class="relative">
                                <input autocomplete="off" id="email" name="email" type="email"
                                    class="peer placeholder-transparent h-12 w-full border-b-2
                                    @error('email') border-red-500 @else border-gray-300 @enderror
                                    text-gray-900 focus:outline-none focus:border-cyan-500 transition-all duration-200"
                                    placeholder="Correo electrónico" value="{{ old('email') }}" />
                                <label for="email" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                                    Correo electrónico
                                </label>
                                @error('email')
                                <small class="text-red-500 mt-1"><strong>{{ $message }}</strong></small>
                                @enderror
                            </div>

                            <div class="w-full relative">
                                <input autocomplete="off" id="password" name="password" type="password"
                                    class="peer placeholder-transparent h-12 w-full border-b-2
                                    @error('password') border-red-500 @else border-gray-300 @enderror
                                    text-gray-900 focus:outline-none focus:border-cyan-500 transition-all duration-200"
                                    placeholder="Contraseña" />

                                <label for="password" class="absolute left-0 -top-3.5 text-gray-600 text-sm
                                    peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400
                                    peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                                    Contraseña
                                </label>

                                <div class="absolute inset-y-0 right-2 sm:right-3 flex items-center z-20 px-3">
                                    <button type="button" id="togglePassword" class="cursor-pointer text-gray-400 rounded-md focus:outline-none focus:text-blue-600">
                                        <i id="eye-icon" class="fas fa-eye-slash"></i>
                                    </button>
                                </div>

                                @error('password')
                                <small class="text-red-500 mt-2 text-sm block">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>

                            <div class="flex items-center justify-between mt-6">

                                <a href="{{route('verify')}}" class="text-sm text-cyan-600 hover:text-cyan-700">¿Olvidaste tu contraseña?</a>
                            </div>

                            <div class="relative mt-6">
                                <button type="submit" class="w-full py-3 bg-cyan-600 text-white font-semibold rounded-lg shadow-md hover:bg-cyan-700 focus:outline-none transition duration-300 ease-in-out transform hover:scale-105">
                                    Ingresar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="mt-6 text-center text-neutral-800 ">
                    ¿No tienes cuenta?
                    <a href="{{route('register')}}" class="text-cyan-600 hover:text-cyan-700 focus:text-cyan-700">Regístrate</a>
                </p>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById("togglePassword").addEventListener("click", function() {
    const passwordField = document.getElementById("password");
    const eyeIcon = document.getElementById("eye-icon");

    if (passwordField.type === "password") {
        passwordField.type = "text"; // Mostrar la contraseña
        eyeIcon.classList.replace("fa-eye-slash", "fa-eye"); // Cambiar a ícono de ojo abierto
    } else {
        passwordField.type = "password"; // Ocultar la contraseña
        eyeIcon.classList.replace("fa-eye", "fa-eye-slash"); // Cambiar a ícono de ojo cerrado
    }
});


</script>

@endsection


