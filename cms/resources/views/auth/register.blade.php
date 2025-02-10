
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
                        <h1 class="text-3xl font-semibold text-gray-800">¡Regístrate ahora!</h1>
                        <p class="mt-2 text-gray-500">Únete a nuestra comunidad de forma rápida y fácil.</p>
                    </div>
                    <div class="divide-y divide-gray-200 space-y-6">
                        <!-- Paso 1 -->
                        <div id="step-1" class="step">
                            <h2 class="text-2xl text-center font-semibold text-indigo-600 mb-6">Paso 1: Información Personal</h2>
                            <!-- Nombres y Apellidos -->
                            <div class="grid gap-6 md:grid-cols-2">
                                <div class="w-full">
                                    <label for="first_name" class="block mb-2 text-sm font-medium text-slate-700">Nombres</label>
                                    <input type="text" id="first_name" name="first_name"
                                        class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200
                                        @error('first_name') border-red-500 @else  @enderror"
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
                                        @error('last_name') border-red-500 @else  @enderror"
                                        placeholder="Apellido" oninput="validateName(this)" />
                                    @error('last_name')
                                        <small class="text-red-500 mt-1 text-sm">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Fecha de Nacimiento y Nacionalidad -->
                            <div class="grid gap-6 md:grid-cols-2">
                                <div class="w-full">
                                    <label for="date_of_birth" class="block mb-2 text-sm font-medium text-slate-700">Fecha de Nacimiento</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth"
                                        class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200
                                        @error('date_of_birth') border-red-500 @else @enderror"
                                        max="{{ now()->subYears(18)->toDateString() }}" min="{{ now()->subYears(124)->toDateString() }}"
                                        onchange="checkAge(this)" />
                                    @error('date_of_birth')
                                        <small class="text-red-500 mt-1 text-sm">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                    @enderror
                                </div>

                                <div class="w-full">
                                    <label for="nationality" class="block mb-2 text-sm font-medium text-slate-700">Nacionalidad</label>
                                    <select name="nacionalidad" id="nationality"
                                        class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200
                                        @error('nacionalidad') border-red-500 @else @enderror">
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

                            <!-- Cédula y Género -->
                            <div class="grid gap-6 md:grid-cols-2">
                                <div class="w-full">
                                    <label for="cedula" class="block mb-2 text-sm font-medium text-slate-700">Cédula de Identidad</label>
                                    <div class="relative">
                                        <input type="text" id="cedula" name="cedula"
                                            class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border-2 rounded-lg px-4 py-3 pr-10 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200
                                            @error('cedula') border-red-500 @else  @enderror"
                                            oninput="validateCedula(event)"
                                            placeholder="Cédula de Identidad" maxlength="10" />
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
                                    <label for="gender" class="block mb-2 text-sm font-medium text-gray-700">Género</label>
                                    <select id="gender" name="genero" class="w-full bg-white text-gray-700 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200">
                                        <option value="" selected>Selecciona tu género</option>
                                        <option value="masculino" @if(old('genero') == 'masculino') selected @endif>Masculino</option>
                                        <option value="femenino" @if(old('genero') == 'femenino') selected @endif>Femenino</option>
                                    </select>
                                    @error('genero')
                                        <small class="text-red-500 mt-1 text-sm">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Paso 2 -->
                        <div id="step-2" class="step hidden">
                            <h2 class="text-2xl text-center font-semibold text-indigo-600 mb-6">Paso 2: Información de Cuenta</h2>
                            <!-- Contenedor para Correo Electrónico y Nombre de Usuario -->
                            <div class="grid gap-6 md:grid-cols-2 mt-6">
                                <!-- Correo Electrónico -->
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

                                <!-- Nombre de Usuario -->
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

                            <!-- Contraseña y Confirmar Contraseña -->
                            <div class="grid gap-6 md:grid-cols-2 mt-6">
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
                        <div id="step-3" class="step hidden">
                            <h2 class="text-2xl text-center font-semibold text-indigo-600 mb-6">Paso 3: Ubicación</h2>
                            <div class="grid gap-8 md:grid-cols-2">
                                <div class="w-full">
                                    <label for="estado" class="block mb-2 text-sm font-medium text-gray-700">Estado</label>
                                    <select id="estado" name="estado" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200">
                                        <option value="" selected>Selecciona estado</option>
                                        @foreach ($estados as $items)
                                        <option value="{{ $items->idestados }}" @if (old('estado_id') == $items->idestados) selected @endif>
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
                        <script>
                            // Al cambiar el estado
                            document.getElementById('estado').addEventListener('change', function() {
                                let estadoId = this.value;

                                // Solo realiza la petición si se ha seleccionado un estado
                                if (estadoId) {
                                    // Solicitar las ciudades
                                    fetch(`/get-ciudades/${estadoId}`)
                                        .then(response => response.json())
                                        .then(data => {
                                            let ciudadSelect = document.getElementById('ciudad');
                                            ciudadSelect.innerHTML = '<option value="">Selecciona ciudad</option>'; // Limpiar ciudades anteriores

                                            // Iteramos por cada ciudad y la agregamos como opción
                                            data.forEach(function(ciudad) {
                                                let option = document.createElement('option');
                                                option.value = ciudad.idcuidades;
                                                option.textContent = ciudad.ciudad;
                                                ciudadSelect.appendChild(option);
                                            });
                                        });

                                    // Solicitar los municipios
                                    fetch(`/get-municipios/${estadoId}`)
                                        .then(response => response.json())
                                        .then(data => {
                                            let municipioSelect = document.getElementById('municipio');
                                            municipioSelect.innerHTML = '<option value="">Selecciona municipio</option>'; // Limpiar municipios anteriores

                                            // Iteramos por cada municipio y lo agregamos como opción
                                            data.forEach(function(municipio) {
                                                let option = document.createElement('option');
                                                option.value = municipio.idmunicipios;
                                                option.textContent = municipio.municipio;
                                                municipioSelect.appendChild(option);
                                            });
                                        });

                                } else {
                                    // Limpiar los selectores si no hay estado seleccionado
                                    document.getElementById('ciudad').innerHTML = '<option value="">Selecciona ciudad</option>';
                                    document.getElementById('municipio').innerHTML = '<option value="">Selecciona municipio</option>';
                                    document.getElementById('parroquia').innerHTML = '<option value="">Selecciona parroquia</option>';
                                }
                            });

                            // Al cambiar el municipio
                            document.getElementById('municipio').addEventListener('change', function() {
                                let municipioId = this.value;

                                // Solo realiza la petición si se ha seleccionado un municipio
                                if (municipioId) {
                                    fetch(`/get-parroquias/${municipioId}`)
                                        .then(response => response.json())
                                        .then(data => {
                                            let parroquiaSelect = document.getElementById('parroquia');
                                            parroquiaSelect.innerHTML = '<option value="">Selecciona parroquia</option>'; // Limpiar parroquias anteriores

                                            // Iteramos por cada parroquia y la agregamos como opción
                                            data.forEach(function(parroquia) {
                                                let option = document.createElement('option');
                                                option.value = parroquia.idparroquias;
                                                option.textContent = parroquia.parroquia;
                                                parroquiaSelect.appendChild(option);
                                            });
                                        });
                                } else {
                                    document.getElementById('parroquia').innerHTML = '<option value="">Selecciona parroquia</option>';
                                }
                            });
                        </script>

                        <!-- Paso 4 -->
                        <div id="step-4" class="step hidden">
                            <h2 class="text-2xl text-center font-semibold text-indigo-600 mb-8">Paso 4: Información Académica</h2>
                            <div class="grid gap-8 md:grid-cols-2">
                                <!-- Nivel Académico -->
                                <div class="w-full">
                                    <label for="nivel_academico" class="block mb-2 text-sm font-medium text-gray-700">Nivel Académico</label>
                                    <select id="nivel_academico" name="niveles_academicos_idniveles_academicos" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200">
                                        <option value="">Selecciona un nivel académico</option>
                                        @foreach ($nivelesAcademicos as $item)
                                            <option value="{{ $item->idniveles_academicos }}" @if (old('niveles_academicos_idniveles_academicos') == $item->idniveles_academicos) selected @endif>
                                                {{ $item->nombre_nivel }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Tipo de Mención -->
                                <div class="w-full">
                                    <label for="mencion" class="block mb-2 text-sm font-medium text-gray-700">Tipo de Mención</label>
                                    <select id="mencion" name="menciones_idmenciones" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200">
                                        <option value="">Selecciona una mención</option>
                                        @foreach ($menciones as $items)
                                            <option value="{{ $items->idmenciones }}" @if (old('menciones_idmenciones') == $items->idmenciones) selected @endif>
                                                {{ $items->nombre_mencion }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid gap-8 md:grid-cols-1 mt-8">
                                <!-- Estudios Logrados -->
                                <div class="w-full">
                                    <label for="estudios_logrados" class="block mb-2 text-sm font-medium text-gray-700">Estudios Logrados</label>
                                    <input type="text" id="estudios_logrados" name="estudios_logrados" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" placeholder="Introduce tus estudios logrados" />
                                </div>

                                <!-- Idiomas -->
                                <div class="w-full mt-6">
                                    <label class="block mb-4 text-sm font-medium text-gray-700">Idiomas</label>
                                    <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                                        @foreach ($idiomas as $idioma)
                                            <div class="flex items-center space-x-3">
                                                <input type="checkbox" id="idioma_{{ $idioma->ididiomas }}" name="idiomas[]" value="{{ $idioma->ididiomas }}"
                                                    class="bg-white text-indigo-600 border-2 rounded-lg w-5 h-5 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200"
                                                    @if (in_array($idioma->ididiomas, old('idiomas', []))) checked @endif
                                                />
                                                <label for="idioma_{{ $idioma->ididiomas }}" class="text-sm text-gray-700">
                                                    {{ $idioma->nombre_idioma }} ({{ $idioma->nivel_idioma }})
                                                </label>
                                            </div>
                                        @endforeach
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
                                    <input type="text" id="institution_name" name="certificaciones[0][institucion]" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" placeholder="Ejemplo: Universidad Nacional" />
                                </div>
                                <!-- Nombre del Certificado -->
                                <div class="w-full">
                                    <label for="certificate_name" class="block mb-2 text-sm font-medium text-gray-700">Nombre del Certificado</label>
                                    <input type="text" id="certificate_name" name="certificaciones[0][nombre_institucion]" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" placeholder="Ejemplo: Certificado en Gestión de Proyectos" />
                                </div>
                            </div>
                            <div class="mt-8 w-full">
                                <!-- Fecha de Expedición -->
                                <label for="issue_date" class="block mb-2 text-sm font-medium text-gray-700">Fecha de Expedición</label>
                                <input type="date" id="issue_date" name="certificaciones[0][fecha_expedicion]" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" />
                            </div>
                        </div>


                        <!-- Paso 6 -->
<div id="step-6" class="step hidden">
    <h2 class="text-2xl text-center font-semibold text-indigo-600 mb-6">Paso 6: Experiencia Laboral</h2>
    <div class="grid gap-8 md:grid-cols-2">
        <div class="w-full">
            <label for="company" class="block mb-2 text-sm font-medium text-gray-700">Empresa</label>
            <input type="text" id="company" name="experiencia_laboral[0][empresa]" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" placeholder="Nombre de la empresa" />
        </div>
        <div class="w-full">
            <label for="position" class="block mb-2 text-sm font-medium text-gray-700">Cargo</label>
            <input type="text" id="position" name="experiencia_laboral[0][cargo]" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" placeholder="Cargo desempeñado" />
        </div>
    </div>
    <div class="grid gap-8 md:grid-cols-2 mt-6">
        <div class="w-full">
            <label for="start_date" class="block mb-2 text-sm font-medium text-gray-700">Fecha de Inicio</label>
            <input type="date" id="start_date" name="experiencia_laboral[0][fecha_inicio]" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" />
        </div>
        <div class="w-full">
            <label for="end_date" class="block mb-2 text-sm font-medium text-gray-700">Fecha de Fin</label>
            <input type="date" id="end_date" name="experiencia_laboral[0][fecha_fin]" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" />
        </div>
    </div>
    <div class="mt-8 w-full">
        <label for="skills" class="block mb-2 text-sm font-medium text-gray-700">Habilidades</label>
        <textarea id="skills" name="experiencia_laboral[0][habilidades]" class="w-full bg-white text-gray-700 placeholder:text-gray-400 text-sm border-2 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200" rows="4" placeholder="Describe tus habilidades adquiridas en esta experiencia"></textarea>
    </div>
</div>



                        <div id="step-7" class="step hidden">
                            <h2 class="text-2xl text-center font-semibold text-indigo-600 mb-6">Paso 7: Preguntas de Seguridad</h2>
                            <!-- Preguntas de Seguridad -->
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


                                    @error('respuesta_1')
                                        <small class="text-red-500 mt-1 text-sm"><strong>{{ $message }}</strong></small>
                                    @enderror
                                </div>

                                <div class="w-full">
                                    <label for="pregunta_2" class="block mb-2 text-sm font-medium text-slate-700">Pregunta 2</label>
                                    <select id="pregunta_2" name="pregunta_2" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('pregunta_2') border-red-500 @else border-slate-300 @enderror transition duration-200 ease-in-out hover:bg-gray-50">
                                        <option selected class="bg-gray-100">Selecciona una pregunta de seguridad</option>
                                        @foreach ($preguntas as $items)
                                            <option value="{{ $items->idpregunta }}">{{ $items->pregunta }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" id="respuesta_2" name="respuesta_2" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3 mt-4 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('respuesta_2') border-red-500 @else border-slate-300 @enderror transition duration-200 ease-in-out hover:bg-gray-50" placeholder="Tu respuesta">


                                    @error('respuesta_2')
                                        <small class="text-red-500 mt-1 text-sm"><strong>{{ $message }}</strong></small>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid gap-8 md:grid-cols-2 mt-6">
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
                    </div>

                    <!-- Botones de Navegación -->
                    <div class="flex justify-between mt-8">
                        <button type="button" id="prevBtn"
                            class="w-full py-3 bg-slate-500 text-white font-semibold rounded-lg shadow-md hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 transition duration-200 ease-in-out transform hover:scale-105 hidden"
                            onclick="prevStep()">🡰 Anterior</button>
                        <button type="button" id="nextBtn"
                            class="w-full py-3 bg-indigo-500 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 transition duration-200 ease-in-out transform hover:scale-105 mx-2"
                            onclick="nextStep()">Siguiente 🡲</button>
                        <button type="submit" id="finishBtn"
                            class="w-full py-3 bg-indigo-500 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 transition duration-200 ease-in-out transform hover:scale-105 hidden">Finalizar</button>
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

    function nextStep() {
        if (currentStep < 7) {
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
</script>
@endsection
