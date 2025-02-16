@extends('auth.layout')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-indigo-500 to-teal-500 py-12 flex flex-col justify-center sm:py-16">
    <div class="relative py-6 sm:max-w-xl sm:mx-auto">
        <!-- Fondo Gradiente con sombra y transformaciones -->
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-400 to-teal-500 shadow-xl transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
        <div class="relative px-8 py-10 bg-white shadow-2xl sm:rounded-3xl sm:p-16">
            <form action="{{ route('register.verify') }}" method="POST">
                @csrf
                <div class="max-w-md mx-auto">
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-semibold text-gray-800">Registro</h1>
                    </div>
                    <div class="divide-y divide-gray-200 space-y-6">
                            <!-- Paso 1 -->
                            <div class="py-8 text-base leading-6 space-y-8 text-gray-700 sm:text-lg sm:leading-7" id="step-1">
                                <h2 class="text-2xl text-center m-2 border-b-4 border-indigo-600 font-semibold mb-8">Paso 1</h2>

                                <div class="grid gap-8 md:grid-cols-2">
                                    <div class="w-full">
                                        <label for="first_name" class="block mb-2 text-sm font-medium text-slate-700">Nombres</label>
                                        <input type="text" id="first_name" name="first_name"
                                            class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200
                                            @error('first_name') border-red-500 @else border-slate-300 @enderror"
                                            placeholder="Nombre" oninput="validateName(this)" />
                                        @error('first_name')
                                            <small class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="w-full">
                                        <label for="last_name" class="block mb-2 text-sm font-medium text-slate-700">Apellidos</label>
                                        <input type="text" id="last_name" name="last_name"
                                            class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200
                                            @error('last_name') border-red-500 @else border-slate-300 @enderror"
                                            placeholder="Apellido" oninput="validateName(this)" />
                                        @error('last_name')
                                            <small class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid gap-8 md:grid-cols-2">
                                    <div class="mt-6">
                                        <label for="date_of_birth" class="block mb-2 text-sm font-medium text-slate-700">Fecha de Nacimiento</label>
                                        <input type="date" id="date_of_birth" name="date_of_birth"
                                            class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200
                                            @error('date_of_birth') border-red-500 @else border-slate-300 @enderror"
                                            max="{{ now()->subYears(18)->toDateString() }}" min="{{ now()->subYears(124)->toDateString() }}"
                                            onchange="checkAge(this)" />
                                        @error('date_of_birth')
                                            <small class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="mt-6">
                                        <label for="nationality" class="block mb-2 text-sm font-medium text-slate-700">Nacionalidad</label>
                                        <select name="nacionalidad" id="nationality"
                                            class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200
                                            @error('nacionalidad') border-red-500 @else border-slate-300 @enderror">
                                            <option value="" selected>Selecciona Nacionalidad</option>
                                            @foreach ($nacionalidades as $items)
                                                <option value="{{ $items->idnacionalidad }}"
                                                    @if (old('nacionalidad') == $items->idnacionalidad) selected @endif>
                                                    {{ $items->nacionalidad }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('nacionalidad')
                                            <small class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="grid gap-8 md:grid-cols-2">
                                    <div class="w-full">
                                        <label for="cedula" class="block mb-2 text-sm font-medium text-slate-700">Cédula de Identidad</label>
                                        <div class="relative">
                                            <input type="text" id="cedula" name="cedula" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border-2 rounded-lg px-4 py-3 pr-10 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200
                                                @error('cedula') border-red-500 focus:ring-red-500 @else border-slate-300 @enderror"
                                                oninput="validateCedula(event)"
                                                placeholder="Cédula de Identidad"
                                                maxlength="10"
                                            />
                                            <span class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                                                <i class="fas fa-id-card text-slate-400"></i>
                                            </span>
                                        </div>
                                        @error('cedula')
                                            <p class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </p>
                                        @enderror
                                    </div>


                                    <div class="w-full">
                                        <label for="user_name" class="block mb-2 text-sm font-medium text-slate-700">Nombre de usuario</label>
                                        <input type="text" id="user_name" name="user_name"
                                            class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200
                                            @error('user_name') border-red-500 @else border-slate-300 @enderror"
                                            placeholder="Nombre de usuario" />
                                        @error('user_name')
                                            <small class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Paso 2 -->
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7" id="step-2">
                                <h2 class="text-2xl text-center m-2 border-b-4 border-indigo-600 font-semibold mb-6">Paso 2</h2>

                                <div class="grid gap-8 md:grid-cols-2">
                                    <div class="w-full">
                                        <label for="address" class="block mb-2 text-sm font-medium text-slate-700">Dirección</label>
                                        <textarea id="address" name="address"
                                            class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200
                                            @error('address') border-red-500 @else border-slate-300 @enderror"
                                            placeholder="Dirección"></textarea>
                                        @error('address')
                                            <small class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="w-full">
                                        <label for="email" class="block mb-2 text-sm font-medium text-slate-700">Correo Electrónico</label>
                                        <input type="email" id="email" name="email"
                                            class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200
                                            @error('email') border-red-500 @else border-slate-300 @enderror"
                                            placeholder="Correo Electrónico" />
                                        @error('email')
                                            <small class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid gap-8 md:grid-cols-2 mt-6">
                                    <div class="w-full">
                                        <label for="password" class="block mb-2 text-sm font-medium text-slate-700">Contraseña</label>
                                        <div class="relative">
                                            <input type="password" id="password" name="password"
                                                class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200 ease-in-out hover:bg-gray-50
                                                @error('password') border-red-500 @else border-slate-300 @enderror"
                                                placeholder="Contraseña" />

                                            <button type="button" id="togglePassword"
                                                class="absolute inset-y-0 right-3 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-md focus:outline-none focus:text-blue-600">
                                                <i id="eye-icon" class="fas fa-eye-slash"></i>
                                            </button>
                                        </div>
                                        @error('password')
                                            <small class="text-red-500 mt-2 text-sm block">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="w-full">
                                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-slate-700">Confirmar Contraseña</label>
                                        <div class="relative">
                                            <input type="password" id="password_confirmation" name="password_confirmation"
                                                class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200 ease-in-out hover:bg-gray-50
                                                @error('password_confirmation') border-red-500 @else border-slate-300 @enderror"
                                                placeholder="Repite tu contraseña" />

                                            <button type="button" id="toggleConfirmPassword"
                                                class="absolute inset-y-0 right-3 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-md focus:outline-none focus:text-blue-600">
                                                <i id="eye-icon-confirm-password" class="fas fa-eye-slash"></i>
                                            </button>
                                        </div>
                                        @error('password_confirmation')
                                            <small class="text-red-500 mt-2 text-sm block">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Paso 3 -->
                            <div class="py-8 text-base leading-6 space-y-6 text-gray-700 sm:text-lg sm:leading-7" id="step-3">
                                <h2 class="text-xl text-center m-2 border-b-2 border-indigo-500 font-semibold mb-6">Paso 3</h2>

                                <!-- Formulario de preguntas de seguridad -->
                                <div class="grid gap-8 md:grid-cols-2">

                                    <div class="w-full">
                                        <label for="pregunta_1" class="block mb-2 text-sm font-medium text-slate-700">Pregunta 1</label>
                                        <select id="pregunta_1" name="pregunta_1" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('pregunta_1') border-red-500 @else border-slate-300 @enderror transition duration-200 ease-in-out hover:bg-gray-50">
                                            <option selected class="bg-gray-100">Selecciona una pregunta de seguridad</option>
                                            @foreach ($preguntas as $items)
                                                <option value="{{ $items->idpregunta }}">{{ $items->pregunta }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" id="respuesta_1" name="respuesta_1" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3 mt-4 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('respuesta_1') border-red-500 @else border-slate-300 @enderror transition duration-200 ease-in-out hover:bg-gray-50" placeholder="Tu respuesta">

                                        @error('pregunta_1')
                                            <small class="text-red-500 mt-1 text-sm"><strong>{{ $message }}</strong></small>
                                        @enderror
                                        @error('respuesta_1')
                                            <small class="text-red-500 mt-1 text-sm"><strong>{{ $message }}</strong></small>
                                        @enderror
                                    </div>

                                    <!-- Pregunta 2 -->
                                    <div class="w-full">
                                        <label for="pregunta_2" class="block mb-2 text-sm font-medium text-slate-700">Pregunta 2</label>
                                        <select id="pregunta_2" name="pregunta_2" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('pregunta_2') border-red-500 @else border-slate-300 @enderror transition duration-200 ease-in-out hover:bg-gray-50">
                                            <option selected class="bg-gray-100">Selecciona una pregunta de seguridad</option>
                                            @foreach ($preguntas as $items)
                                                <option value="{{ $items->idpregunta }}">{{ $items->pregunta }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" id="respuesta_2" name="respuesta_2" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3 mt-4 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('respuesta_2') border-red-500 @else border-slate-300 @enderror transition duration-200 ease-in-out hover:bg-gray-50" placeholder="Tu respuesta">

                                        @error('pregunta_2')
                                            <small class="text-red-500 mt-1 text-sm"><strong>{{ $message }}</strong></small>
                                        @enderror
                                        @error('respuesta_2')
                                            <small class="text-red-500 mt-1 text-sm"><strong>{{ $message }}</strong></small>
                                        @enderror
                                    </div>

                                </div>

                                <div class="grid gap-8 md:grid-cols-2 mt-6">

                                    <!-- Pregunta 3 -->
                                    <div class="w-full">
                                        <label for="pregunta_3" class="block mb-2 text-sm font-medium text-slate-700">Pregunta 3</label>
                                        <select id="pregunta_3" name="pregunta_3" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('pregunta_3') border-red-500 @else border-slate-300 @enderror transition duration-200 ease-in-out hover:bg-gray-50">
                                            <option selected class="bg-gray-100">Selecciona una pregunta de seguridad</option>
                                            @foreach ($preguntas as $items)
                                                <option value="{{ $items->idpregunta }}">{{ $items->pregunta }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" id="respuesta_3" name="respuesta_3" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3 mt-4 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('respuesta_3') border-red-500 @else border-slate-300 @enderror transition duration-200 ease-in-out hover:bg-gray-50" placeholder="Tu respuesta">

                                        @error('pregunta_3')
                                            <small class="text-red-500 mt-1 text-sm"><strong>{{ $message }}</strong></small>
                                        @enderror
                                        @error('respuesta_3')
                                            <small class="text-red-500 mt-1 text-sm"><strong>{{ $message }}</strong></small>
                                        @enderror
                                    </div>

                                    <!-- Pregunta 4 -->
                                    <div class="w-full">
                                        <label for="pregunta_4" class="block mb-2 text-sm font-medium text-slate-700">Pregunta 4</label>
                                        <select id="pregunta_4" name="pregunta_4" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('pregunta_4') border-red-500 @else border-slate-300 @enderror transition duration-200 ease-in-out hover:bg-gray-50">
                                            <option selected class="bg-gray-100">Selecciona una pregunta de seguridad</option>
                                            @foreach ($preguntas as $items)
                                                <option value="{{ $items->idpregunta }}">{{ $items->pregunta }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" id="respuesta_4" name="respuesta_4" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3 mt-4 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('respuesta_4') border-red-500 @else border-slate-300 @enderror transition duration-200 ease-in-out hover:bg-gray-50" placeholder="Tu respuesta">

                                        @error('pregunta_4')
                                            <small class="text-red-500 mt-1 text-sm"><strong>{{ $message }}</strong></small>
                                        @enderror
                                        @error('respuesta_4')
                                            <small class="text-red-500 mt-1 text-sm"><strong>{{ $message }}</strong></small>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <!-- Paso 4 -->
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7 hidden"
                                id="step-4">
                                <h2 class="text-xl text-center m-2 border-b-2 border-indigo-500 font-semibold mb-6">Paso 4
                                </h2>
                                <div class="grid gap-8 md:grid-cols-2">

                                    <div class="w-full">
                                        <label for="facebook"
                                            class="block mb-2 text-sm font-medium text-slate-700">Facebook</label>
                                        <input type="text" id="facebook" name="facebook"
                                            class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3
                                         focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200
                                         ease-in-out hover:bg-gray-50
                                         @error('facebook') border-red-500 @else border-slate-300 @enderror">
                                        @error('facebook')
                                            <small class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="w-full">
                                        <label for="x" class="block mb-2 text-sm font-medium text-slate-700">X (Antiguo Twitter)</label>
                                        <input type="text" id="x" name="x"
                                            class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3
                                                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200
                                                  ease-in-out hover:bg-gray-50
                                                  @error('x') border-red-500 @else border-slate-300 @enderror">
                                        @error('x')
                                            <small class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid gap-8 md:grid-cols-2 mt-6">
                                    <div class="w-full">
                                        <label for="instagram"
                                            class="block mb-2 text-sm font-medium text-slate-700">Instagram</label>
                                        <input type="text" id="instagram" name="instagram"
                                            class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3
                                                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200
                                                  ease-in-out hover:bg-gray-50
                                                  @error('instagram') border-red-500 @else border-slate-300 @enderror">
                                        @error('instagram')
                                            <small class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="w-full">
                                        <label for="tiktok"
                                            class="block mb-2 text-sm font-medium text-slate-700">Tik-tok</label>
                                        <input type="text" id="tiktok" name="tiktok"
                                            class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3
                                                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200
                                                  ease-in-out hover:bg-gray-50
                                                  @error('tiktok') border-red-500 @else border-slate-300 @enderror">
                                        @error('tiktok')
                                            <small class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                    </div>
                                </div>

                                <x-summernote />

                           </div>
                        </div>

                        <div class="flex justify-between mt-8">
                            <button type="button" id="prevBtn"
                                class="w-full py-3 bg-slate-500 text-white font-semibold rounded-lg shadow-md hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 transition duration-200 ease-in-out transform hover:scale-105 hidden"
                                onclick="prevStep()">🡰 Anterior</button>
                            <button type="button" id="nextBtn"
                                class="w-full py-3 bg-indigo-500 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 transition duration-200 ease-in-out transform hover:scale-105 mx-2"
                                onclick="nextStep()">Siguiente 🡲</button>
                            <button type="submit" id="finishBtn"
                                class="w-full py-3 bg-indigo-500 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 transition duration-200 ease-in-out transform hover:scale-105">Finalizar</button>
                        </div>
                    </div>

                </form>
                <p class="mt-6 text-center text-neutral-800">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}" class="text-cyan-600 hover:text-cyan-700 focus:text-cyan-700">Ingresa
                        aqui</a>
                </p>
            </div>
        </div>
    </div>

    <script>
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
        function validateName(input) {
            const regex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/;
            if (!regex.test(input.value)) {
                input.value = input.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');

            }
        }

        let currentStep = 1;

        function showStep(step) {
            for (let i = 1; i <= 4; i++) {
                document.getElementById('step-' + i).classList.add('hidden');
            }

            document.getElementById('step-' + step).classList.remove('hidden');

            if (step === 1) {
                document.getElementById('prevBtn').classList.add('hidden');
                document.getElementById('nextBtn').classList.remove('hidden');
                document.getElementById('finishBtn').classList.add('hidden');
            } else if (step === 2 || step === 3) {
                document.getElementById('prevBtn').classList.remove('hidden');
                document.getElementById('nextBtn').classList.remove('hidden');
                document.getElementById('finishBtn').classList.add('hidden');
            } else if (step === 4) {
                document.getElementById('prevBtn').classList.remove('hidden');
                document.getElementById('nextBtn').classList.add('hidden');
                document.getElementById('finishBtn').classList.remove('hidden');
            }
        }

        function nextStep() {
            if (currentStep < 4) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        }

        showStep(currentStep);

        document.getElementById("togglePassword").addEventListener("click", function() {
            const passwordField = document.getElementById("password");
            const eyeIcon = document.getElementById("eye-icon");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.replace("fa-eye-slash", "fa-eye");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.replace("fa-eye", "fa-eye-slash");
            }
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
        const passwordField = document.getElementById('password_confirmation');
        const eyeIcon = document.getElementById('eye-icon-confirm-password');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        } else {
            passwordField.type = 'password';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        }
    });

    function validateCedula(event) {
    const input = event.target;

    input.value = input.value.replace(/[^0-9]/g, '');

    if (parseInt(input.value) <= 0) {
        input.value = '';
    }
}


    </script>
@endsection
