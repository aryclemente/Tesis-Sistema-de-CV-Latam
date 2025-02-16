@extends('auth.layout')

@section('content')
    <div class="min-h-screen bg-gradient-to-r from-cyan-500 to-sky-500 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-sky-500 shadow-xl transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-6 py-10 bg-white shadow-xl sm:rounded-3xl sm:p-16">
                <form action="{{ route('verify.email') }}" method="POST">
                    @csrf
                    <div class="max-w-md mx-auto">
                        <div class="text-center mb-6">
                            <h1 class="text-4xl font-semibold text-gray-800">Recuperar Contraseña</h1>
                        </div>
                        <p class="text-center text-sm text-gray-600 mb-6 italic font-medium leading-relaxed">
                            Ingresa tu correo electrónico para recibir
                            </br>instrucciones de recuperación.
                        </p>

                        @error('email')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6" role="alert">
                                <strong class="font-bold">Error:</strong>
                                <span class="block sm:inline">{{ $message }}</span>
                                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror

                        <div class="divide-y divide-gray-200">
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">

                                <div class="text-center text-sm text-gray-600 mb-4">
                                    <p>¿Recordaste tu contraseña?
                                        <a href="{{ route('login') }}"
                                            class="text-cyan-600 hover:text-cyan-700 focus:text-cyan-700">Inicia sesión</a>
                                    </p>
                                </div>


                                <div class="relative">
                                    <input type="email" id="email" name="email"
                                        class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 "
                                        placeholder="Correo Electrónico" value="{{ old('email') }}" />

                                </div>

                                <div class="relative mt-6">
                                    <button type="submit"
                                        class="w-full py-3 bg-cyan-600 text-white font-semibold rounded-lg shadow-md hover:bg-cyan-700 focus:outline-none transition duration-300 ease-in-out transform hover:scale-105">
                                        Enviar enlace de recuperación
                                    </button>
                                </div>

                                <!-- Enlace para crear una cuenta -->
                                <div class="text-center text-sm text-gray-600 mt-6">
                                    <p>¿No tienes una cuenta?
                                        <a href="{{ route('register') }}"
                                            class="text-cyan-600 hover:text-cyan-700 focus:text-cyan-700">Crea una aquí</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
