<body class="bg-gray-50 text-gray-900 min-h-screen flex flex-col font-sans">

    <x-navbar />
    <div class="min-h-screen bg-gradient-to-r from-indigo-600 to-teal-600 py-16 flex flex-col justify-center sm:py-24">
        <div class="relative py-6 sm:max-w-lg sm:mx-auto">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-teal-500 shadow-xl transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
            <div class="relative px-8 py-10 bg-white shadow-2xl sm:rounded-3xl sm:p-16">
                <form action="" method="POST">
                    @csrf
                    <div class="max-w-md mx-auto">
                        <div class="text-center mb-8">
                            <h1 class="text-3xl font-semibold text-gray-800">¡Regístrate ahora!</h1>
                            <p class="mt-2 text-gray-500">Únete a nuestra comunidad de forma rápida y fácil.</p>
                        </div>

                        <!-- Paso 1 -->
                        <div id="step-1" class="step">
                            <h2 class="text-2xl text-center font-semibold text-indigo-600 mb-6">Paso 1: Información Personal</h2>
                            <div class="grid gap-8 md:grid-cols-2">
                                <div class="w-full">
                                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-700">Nombre</label>
                                    <input type="text" id="first_name" name="first_name" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" placeholder="Introduce tu nombre" />
                                </div>
                                <div class="w-full">
                                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-700">Apellido</label>
                                    <input type="text" id="last_name" name="last_name" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" placeholder="Introduce tu apellido" />
                                </div>
                            </div>
                            <div class="grid gap-8 md:grid-cols-2 mt-8">
                                <div class="w-full">
                                    <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                                    <input type="date" id="birth_date" name="birth_date" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" />
                                </div>
                                <div class="w-full">
                                    <label for="cedula" class="block mb-2 text-sm font-medium text-gray-700">Cédula</label>
                                    <input type="text" id="cedula" name="cedula" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" placeholder="Introduce tu cédula" />
                                </div>

                            </div>
                            <div class="grid gap-6 md:grid-cols-2 mt-8">
                                <!-- Nacionalidad -->
                                <div class="w-full">
                                    <label for="nacionalidad" class="block mb-2 text-sm font-medium text-gray-700">Nacionalidad</label>
                                    <select id="nacionalidad" name="nacionalidad" class="w-full bg-white text-gray-700 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200">
                                        <option value="" selected>Selecciona tu nacionalidad</option>
                                        @foreach ($nacionalidades as $items)
                                        <option value="{{ $items->id }}" {{ old('nacionalidad') == $items->id ? 'selected' : '' }}>
                                            {{ $items->nacionalidad }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Género -->
                                <div class="w-full">
                                    <label for="gender" class="block mb-2 text-sm font-medium text-gray-700">Género</label>
                                    <select id="gender" name="genero" class="w-full bg-white text-gray-700 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200">
                                        <option value="" selected>Selecciona tu género</option>
                                        <option value="masculino" @if(old('genero') == 'masculino') selected @endif>Masculino</option>
                                        <option value="femenino" @if(old('genero') == 'femenino') selected @endif>Femenino</option>
                                    </select>
                                </div>

                            </div>

                        </div>

                        <!-- Paso 2 -->
                        <div id="step-2" class="step hidden">
                            <h2 class="text-2xl text-center font-semibold text-indigo-600 mb-6">Paso 2: Información de Cuenta</h2>
                            <div class="grid gap-8 md:grid-cols-2">
                                <div class="w-full">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Correo Electrónico</label>
                                    <input type="email" id="email" name="email" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" placeholder="Introduce tu correo electrónico" />
                                </div>
                                <div class="w-full">
                                    <label for="username" class="block mb-2 text-sm font-medium text-gray-700">Nombre de Usuario</label>
                                    <input type="text" id="username" name="username" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" placeholder="Introduce tu nombre de usuario" />
                                </div>
                            </div>
                            <div class="grid gap-8 md:grid-cols-2 mt-8">
                                <div class="w-full">
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Contraseña</label>
                                    <input type="password" id="password" name="password" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" placeholder="Introduce tu contraseña" />
                                </div>
                                <div class="w-full">
                                    <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                                    <input type="password" id="confirm_password" name="confirm_password" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" placeholder="Confirma tu contraseña" />
                                </div>
                            </div>
                        </div>

                        <!-- Paso 3 -->
                        <div id="step-3" class="step hidden">
                            <h2 class="text-2xl text-center font-semibold text-indigo-600 mb-6">Paso 3: Ubicación</h2>
                            <div class="grid gap-8 md:grid-cols-2">

                                <div class="w-full">
                                    <label for="state" class="block mb-2 text-sm font-medium text-gray-700">Estado</label>
                                    <select id="state" name="estado" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200">
                                        <option value="" selected>Selecciona estado</option>
                                        @foreach ($estados as $items)
                                            <option value="{{ $items->id }}" @if (old('estado') == $items->id) selected @endif>
                                                {{ $items->estado }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="w-full">
                                    <label for="ciudad" class="block mb-2 text-sm font-medium text-gray-700">Ciudad</label>
                                    <select id="ciudad" name="ciudad" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200">
                                        <option value="" selected>Selecciona ciudad</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid gap-8 md:grid-cols-2 mt-8">
                                <div class="w-full">
                                    <label for="municipio" class="block mb-2 text-sm font-medium text-gray-700">Municipio</label>
                                    <select id="municipio" name="municipio" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200">
                                        <option value="">Selecciona municipio</option>
                                    </select>
                                </div>

                                <div class="w-full">
                                    <label for="parroquia" class="block mb-2 text-sm font-medium text-gray-700">Parroquia</label>
                                    <select id="parroquia" name="parroquia" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200">
                                        <option value="">Selecciona parroquia</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Paso 4 -->
                        <div id="step-4" class="step hidden">
                            <h2 class="text-2xl text-center font-semibold text-indigo-600 mb-8">Paso 4: Información Académica</h2>
                            <div class="grid gap-8 md:grid-cols-2">
                                <!-- Nivel Académico -->
                                <div class="w-full">
                                    <label for="academic_level" class="block mb-2 text-sm font-medium text-gray-700">Nivel Académico</label>
                                    <select id="academic_level" name="nivel_academico" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200">
                                        <option value="bachelor">Nivel Académico</option>
                                        @foreach ($nivelesAcademicos as $item)  <!-- Corrige la variable aquí -->
                                            <option value="{{ $item->id }}" @if (old('nivel_academico') == $item->id) selected @endif>
                                                {{ $item->nivel_academico }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <!-- Tipo de Mención -->
                                <div class="w-full">
                                    <label for="major" class="block mb-2 text-sm font-medium text-gray-700">Tipo de Mención</label>
                                    <select id="major" name="mencion" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200">
                                        <option value="" selected>Selecciona una mención</option>
                                        @foreach ($menciones as $items)
                                            <option value="{{ $items->id }}" @if  (old('tipo_mencion') == $items->id) selected @endif>
                                                {{ $items->tipo_mencion }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid gap-8 md:grid-cols-1 mt-8">
                                <!-- Estudios Logrados -->
                                <div class="w-full">
                                    <label for="studies" class="block mb-2 text-sm font-medium text-gray-700">Estudios Logrados</label>
                                    <input type="text" id="studies" name="studies" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" placeholder="Introduce tus estudios logrados" />
                                </div>

                                <!-- Idiomas (debajo de Estudios Logrados) -->
                                <div class="w-full mt-6">
                                    <label class="block mb-4 text-sm font-medium text-gray-700">Idiomas</label>
                                    <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                                        @foreach ($idiomas as $idioma)
                                            <div class="flex items-center space-x-3">
                                                <input type="checkbox" id="language_{{ $idioma->id }}" name="languages[]" value="{{ $idioma->id }}"
                                                    class="bg-white text-indigo-600 border-2 rounded-lg w-5 h-5 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200"
                                                    @if (in_array($idioma->id, old('languages', []))) checked @endif
                                                />
                                                <label for="language_{{ $idioma->id }}" class="text-sm text-gray-700">
                                                    {{ $idioma->idioma }} ({{ $idioma->nivel }})
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            </div>
                        </div>

                        <!-- Paso 5 -->
                        <div id="step-5" class="step hidden">
                            <h2 class="text-2xl text-center font-semibold text-indigo-600 mb-6">Paso 5: Certificaciones</h2>
                            <div class="grid gap-8 md:grid-cols-2">
                                <!-- Nombre de la Institución -->
                                <div class="w-full">
                                    <label for="institution_name" class="block mb-2 text-sm font-medium text-gray-700">Nombre de la Institución</label>
                                    <input type="text" id="institution_name" name="institution_name" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" placeholder="Ejemplo: Universidad Nacional" />
                                </div>
                                <!-- Nombre del Certificado -->
                                <div class="w-full">
                                    <label for="certificate_name" class="block mb-2 text-sm font-medium text-gray-700">Nombre del Certificado</label>
                                    <input type="text" id="certificate_name" name="certificate_name" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" placeholder="Ejemplo: Certificado en Gestión de Proyectos" />
                                </div>
                            </div>
                            <div class="mt-8 w-full">
                                <!-- Fecha de Expedición -->
                                <label for="issue_date" class="block mb-2 text-sm font-medium text-gray-700">Fecha de Expedición</label>
                                <input type="date" id="issue_date" name="issue_date" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" />
                            </div>
                        </div>



                        <!-- Paso 6 -->
                        <div id="step-6" class="step hidden">
                            <h2 class="text-2xl text-center font-semibold text-indigo-600 mb-6">Paso 6: Experiencia Laboral</h2>
                            <div class="grid gap-8 md:grid-cols-2">
                                <div class="w-full">
                                    <label for="company" class="block mb-2 text-sm font-medium text-gray-700">Empresa</label>
                                    <input type="text" id="company" name="company" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" placeholder="Nombre de la empresa" />
                                </div>
                                <div class="w-full">
                                    <label for="position" class="block mb-2 text-sm font-medium text-gray-700">Cargo</label>
                                    <input type="text" id="position" name="position" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" placeholder="Cargo desempeñado" />
                                </div>
                            </div>
                            <div class="grid gap-8 md:grid-cols-2 mt-6">
                                <div class="w-full">
                                    <label for="start_date" class="block mb-2 text-sm font-medium text-gray-700">Fecha de Inicio</label>
                                    <input type="date" id="start_date" name="start_date" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" />
                                </div>
                                <div class="w-full">
                                    <label for="end_date" class="block mb-2 text-sm font-medium text-gray-700">Fecha de Fin</label>
                                    <input type="date" id="end_date" name="end_date" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" />
                                </div>
                            </div>
                            <div class="mt-8 w-full">
                                <label for="skills" class="block mb-2 text-sm font-medium text-gray-700">Habilidades</label>
                                <textarea id="skills" name="skills" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" rows="4" placeholder="Describe tus habilidades adquiridas en esta experiencia"></textarea>
                            </div>
                        </div>

                        <!-- Paso 7 -->
                        <div id="step-7" class="step hidden">
                            <h2 class="text-2xl text-center font-semibold text-blue-600 mb-6">Paso 7: Preguntas de Seguridad</h2>
                            <p class="text-center text-gray-600 mb-8">Selecciona y responde cuatro preguntas de seguridad para proteger tu cuenta.</p>

                            <div class="grid gap-8">
                                <!-- Pregunta 1 -->
                                <div class="w-full">
                                    <label for="security_question_1" class="block mb-2 text-sm font-medium text-gray-700">Pregunta 1</label>
                                    <select id="security_question_1" name="pregunta_1" class="w-full bg-white text-gray-700 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200">
                                        <option selected>Selecciona una pregunta</option>
                                        @foreach ($preguntas as $items)
                                        <option value="{{ $items->id }}" {{ old('pregunta_1') == $items->id ? 'selected' : '' }}>
                                            {{ $items->pregunta }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <div class="mt-3">
                                        <input type="text" id="security_answer_1" name="respuesta_1" class="w-full bg-white text-gray-700 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200" placeholder="Escribe tu respuesta" />
                                    </div>
                                </div>

                                <!-- Pregunta 2 -->
                                <div class="w-full">
                                    <label for="security_question_2" class="block mb-2 text-sm font-medium text-gray-700">Pregunta 2</label>
                                    <select id="security_question_2" name="pregunta_2" class="w-full bg-white text-gray-700 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200">
                                        <option selected>Selecciona una pregunta</option>
                                        @foreach ($preguntas as $items)
                                        <option value="{{ $items->id }}" {{ old('pregunta_2') == $items->id ? 'selected' : '' }}>
                                            {{ $items->pregunta }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <div class="mt-3">
                                        <input type="text" id="security_answer_2" name="respuesta_2" class="w-full bg-white text-gray-700 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200" placeholder="Escribe tu respuesta" />
                                    </div>
                                </div>

                                <!-- Pregunta 3 -->
                                <div class="w-full">
                                    <label for="security_question_3" class="block mb-2 text-sm font-medium text-gray-700">Pregunta 3</label>
                                    <select id="security_question_3" name="pregunta_3" class="w-full bg-white text-gray-700 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200">
                                        <option selected>Selecciona una pregunta</option>
                                        @foreach ($preguntas as $items)
                                        <option value="{{ $items->id }}" {{ old('pregunta_3') == $items->id ? 'selected' : '' }}>
                                            {{ $items->pregunta }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <div class="mt-3">
                                        <input type="text" id="security_answer_3" name="respuesta_3" class="w-full bg-white text-gray-700 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200" placeholder="Escribe tu respuesta" />
                                    </div>
                                </div>

                                <!-- Pregunta 4 -->
                                <div class="w-full">
                                    <label for="security_question_4" class="block mb-2 text-sm font-medium text-gray-700">Pregunta 4</label>
                                    <select id="security_question_4" name="pregunta_4" class="w-full bg-white text-gray-700 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200">
                                        <option selected>Selecciona una pregunta</option>
                                        @foreach ($preguntas as $items)
                                        <option value="{{ $items->id }}" {{ old('pregunta_4') == $items->id ? 'selected' : '' }}>
                                            {{ $items->pregunta }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <div class="mt-3">
                                        <input type="text" id="security_answer_4" name="respuesta_4" class="w-full bg-white text-gray-700 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200" placeholder="Escribe tu respuesta" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Botones de navegación -->
                        <div class="mt-8 flex justify-center space-x-4">
                            <button type="button" id="prevBtn" class="flex items-center gap-2 py-3 px-6 bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-600 transition-all duration-300 ease-in-out">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                Anterior
                            </button>

                            <button type="button" id="nextBtn" class="flex items-center gap-2 py-3 px-6 bg-teal-600 text-white font-semibold rounded-lg shadow-md hover:bg-teal-700 transition-all duration-300 ease-in-out">
                                Siguiente
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>

                            <button type="button" id="finishBtn" class="flex items-center gap-2 py-3 px-6 bg-indigo-800 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-900 transition-all duration-300 ease-in-out">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Finalizar
                            </button>

                        </div>
                        <p class="mt-6 text-center text-neutral-800">
                            ¿Ya tienes cuenta?
                            <a href="{{ route('login') }}" class="text-cyan-600 hover:text-cyan-700 focus:text-cyan-700">Ingresa
                                aqui</a>
                        </p>
                    </div>

                </form>

            </div>
        </div>
    </div>


    <script>
 document.getElementById('state').addEventListener('change', function() {
            let estadoId = this.value;

            // Reset los selectores de ciudad, municipio y parroquia
            document.getElementById('ciudad').innerHTML = '<option value="">Selecciona ciudad</option>';
            document.getElementById('municipio').innerHTML = '<option value="">Selecciona municipio</option>';
            document.getElementById('parroquia').innerHTML = '<option value="">Selecciona parroquia</option>';

            if (estadoId) {
                // Obtener ciudades basadas en el estado seleccionado
                fetch(`/get-ciudades/${estadoId}`)
                    .then(response => response.json())
                    .then(data => {
                        let ciudadSelect = document.getElementById('ciudad');
                        data.forEach(ciudad => {
                            let option = document.createElement('option');
                            option.value = ciudad.id;
                            option.textContent = ciudad.ciudad;
                            ciudadSelect.appendChild(option);
                        });
                    });

                // Obtener municipios basados en el estado seleccionado
                fetch(`/get-municipios/${estadoId}`)
                    .then(response => response.json())
                    .then(data => {
                        let municipioSelect = document.getElementById('municipio');
                        data.forEach(municipio => {
                            let option = document.createElement('option');
                            option.value = municipio.id;
                            option.textContent = municipio.municipio;
                            municipioSelect.appendChild(option);
                        });
                    });
            }
        });

        document.getElementById('municipio').addEventListener('change', function() {
            let municipioId = this.value;

            // Reset el selector de parroquia
            document.getElementById('parroquia').innerHTML = '<option value="">Selecciona parroquia</option>';

            if (municipioId) {
                // Obtener parroquias basadas en el municipio seleccionado
                fetch(`/get-parroquias/${municipioId}`)
                    .then(response => response.json())
                    .then(data => {
                        let parroquiaSelect = document.getElementById('parroquia');
                        data.forEach(parroquia => {
                            let option = document.createElement('option');
                            option.value = parroquia.id;
                            option.textContent = parroquia.parroquia;
                            parroquiaSelect.appendChild(option);
                        });
                    });
            }
        });

        let currentStep = 1;

        function showStep(step) {
            // Ocultar todos los pasos
            for (let i = 1; i <= 7; i++) {
                document.getElementById('step-' + i).classList.add('hidden');
            }

            // Mostrar el paso actual
            document.getElementById('step-' + step).classList.remove('hidden');

            // Control de botones
            if (step === 1) {
                document.getElementById('prevBtn').classList.add('hidden');
                document.getElementById('nextBtn').classList.remove('hidden');
                document.getElementById('finishBtn').classList.add('hidden');
            } else if (step === 7) {
                document.getElementById('prevBtn').classList.remove('hidden');
                document.getElementById('nextBtn').classList.add('hidden');
                document.getElementById('finishBtn').classList.remove('hidden');
            } else {
                document.getElementById('prevBtn').classList.remove('hidden');
                document.getElementById('nextBtn').classList.remove('hidden');
                document.getElementById('finishBtn').classList.add('hidden');
            }
        }

        // Botón "Siguiente"
        document.getElementById('nextBtn').addEventListener('click', function () {
            if (currentStep < 7) {
                currentStep++;
                showStep(currentStep);
            }
        });

        // Botón "Anterior"
        document.getElementById('prevBtn').addEventListener('click', function () {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });

        showStep(currentStep);
    </script>
</body>
