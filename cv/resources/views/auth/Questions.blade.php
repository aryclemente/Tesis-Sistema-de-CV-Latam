@extends('auth.layout')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-indigo-500 to-teal-500 py-12 flex flex-col justify-center sm:py-16">
    <div class="relative py-6 sm:max-w-xl sm:mx-auto">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-400 to-teal-500 shadow-xl transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
        </div>
        <div class="relative px-8 py-10 bg-white shadow-2xl sm:rounded-3xl sm:p-16">
            <form action="{{ route('verify.questions') }}" method="POST">
                @csrf
                <div class="max-w-md mx-auto">
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-semibold text-gray-800">Preguntas de Seguridad</h1>
                    </div>
                    @error('invalid_questions')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6" role="alert">
                            <strong class="font-bold">Error:</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror

                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <h2 class="text-xl text-center m-2 border-b-2 border-indigo-500 font-semibold mb-6">Responda sus preguntas de seguridad</h2>
                            @foreach ($preguntas as $index => $pregunta)
                                <div class="w-full mb-6">
                                    <label for="pregunta_{{ $index + 1 }}" class="block mb-2 text-sm font-medium text-slate-700">
                                        {{ $pregunta->pregunta }}
                                    </label>
                                    <input type="hidden" name="pregunta_{{ $index + 1 }}" value="{{ $pregunta->id }}">
                                    <input type="text" id="respuesta_{{ $index + 1 }}" name="respuesta_{{ $index + 1 }}"
                                        value="{{ old('respuesta_' . ($index + 1)) }}"
                                        class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 ease-in-out hover:bg-gray-50
                                        @error('respuesta_' . ($index + 1)) border-red-500 @else border-slate-300 @enderror">
                                    @error('respuesta_' . ($index + 1))
                                        <small class="text-red-500 mt-1 text-sm">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="relative mt-6">
                        <button type="submit"
                            class="w-full py-3 bg-cyan-600 text-white font-semibold rounded-lg shadow-md hover:bg-cyan-700 focus:outline-none transition duration-300 ease-in-out transform hover:scale-105">
                            Validar Preguntas de Seguridad
                        </button>
                    </div>
                </div>
            </form>
            <p class="mt-6 text-center text-neutral-800">
                ¿Ya tienes cuenta?
                <a href="{{ route('login') }}" class="text-cyan-600 hover:text-cyan-700 focus:text-cyan-700">Ingresa aqui</a>
            </p>
        </div>
    </div>
</div>

@endsection
