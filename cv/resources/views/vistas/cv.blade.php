<body class="font-inter">
    <div class="flex h-svh">
        <!-- Sidebar -->
        <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
            <x-side-menu />
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <div>
                <x-profile />
            </div>
            <div class="p-8">
                <!-- Título -->
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Creación de Curriculum</h1>
                @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
                    <strong>{{ session('success') }}</strong>
                </div>
                @endif

                <!-- Secciones -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Direcciones -->
                    <div class="bg-blue-800 text-white p-8 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                        <h2 class="text-2xl font-bold mb-4">Direcciones</h2>
                        <div class="flex items-center space-x-4 mb-6">
                            <i class="fas fa-map-marker-alt fa-2x"></i>
                            <span class="text-lg font-medium">Ubicación Personal</span>
                        </div>
                        <div class="h-1 w-16 bg-gray-200 mb-6"></div>
                        <p class="text-lg mb-4">Agrega y administra tus direcciones personales y de contacto.</p>
                        <a href="{{ route('cv.direccion.create')}}">
                            <button class="mt-4 bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">
                                Registrar
                            </button>
                        </a>
                    </div>

                    <!-- Estudios -->
                    <div class="bg-green-800 text-white p-8 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                        <h2 class="text-2xl font-bold mb-4">Estudios</h2>
                        <div class="flex items-center space-x-4 mb-6">
                            <i class="fas fa-graduation-cap fa-2x"></i>
                            <span class="text-lg font-medium">Formación Académica</span>
                        </div>
                        <div class="h-1 w-16 bg-gray-200 mb-6"></div>
                        <p class="text-lg mb-4">Añade tu historial educativo y los títulos obtenidos.</p>
                        <a href="#">
                            <button class="mt-4 bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700">
                                Registrar
                            </button>
                        </a>
                    </div>

                    <!-- Idiomas -->
                    <div class="bg-purple-800 text-white p-8 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                        <h2 class="text-2xl font-bold mb-4">Idiomas</h2>
                        <div class="flex items-center space-x-4 mb-6">
                            <i class="fas fa-language fa-2x"></i>
                            <span class="text-lg font-medium">Habilidades Lingüísticas</span>
                        </div>
                        <div class="h-1 w-16 bg-gray-200 mb-6"></div>
                        <p class="text-lg mb-4">Especifica los idiomas que dominas y tu nivel de competencia.</p>
                        <a href="#">
                            <button class="mt-4 bg-purple-600 text-white py-2 px-4 rounded-md hover:bg-purple-700">
                                Registrar
                            </button>
                        </a>
                    </div>

                    <!-- Certificaciones -->
                    <div class="bg-yellow-700 text-white p-8 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                        <h2 class="text-2xl font-bold mb-4">Certificaciones</h2>
                        <div class="flex items-center space-x-4 mb-6">
                            <i class="fas fa-certificate fa-2x"></i>
                            <span class="text-lg font-medium">Logros Profesionales</span>
                        </div>
                        <div class="h-1 w-16 bg-gray-200 mb-6"></div>
                        <p class="text-lg mb-4">Registra certificaciones y cursos relevantes para tu carrera.</p>
                        <a href="#">
                            <button class="mt-4 bg-yellow-600 text-white py-2 px-4 rounded-md hover:bg-yellow-700">
                                Registrar
                            </button>
                        </a>
                    </div>

                    <!-- Experiencia Laboral -->
                    <div class="bg-red-700 text-white p-8 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                        <h2 class="text-2xl font-bold mb-4">Experiencia Laboral</h2>
                        <div class="flex items-center space-x-4 mb-6">
                            <i class="fas fa-briefcase fa-2x"></i>
                            <span class="text-lg font-medium">Trayectoria Profesional</span>
                        </div>
                        <div class="h-1 w-16 bg-gray-200 mb-6"></div>
                        <p class="text-lg mb-4">Detalla tu historial laboral y responsabilidades previas.</p>
                        <a href="#">
                            <button class="mt-4 bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700">
                                Registrar
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
