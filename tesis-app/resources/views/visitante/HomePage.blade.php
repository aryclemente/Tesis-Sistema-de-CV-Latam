<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col font-sans">
    <x-navbar />

    <main class="flex-grow">

        <div class="bg-gradient-to-br from-blue-900 to-indigo-900 text-white py-32 shadow-lg" data-aos="fade-up">
            <div class="container mx-auto px-8 lg:px-24 text-center">
                <h1 class="text-6xl font-extrabold leading-tight tracking-tight">
                    Encuentra el trabajo de tus sueños
                </h1>
                <p class="text-lg lg:text-2xl mt-6 font-light max-w-4xl mx-auto leading-relaxed">
                    Conéctate con las mejores oportunidades laborales y lleva tu carrera al siguiente nivel.
                </p>
                <div class="mt-12">
                    <div class="bg-indigo-700 text-white p-8 rounded-xl shadow-lg">
                        <h3 class="text-3xl font-semibold mb-6">Recibe vacantes en tu email</h3>
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">

                            <input type="email" placeholder="Introduce tu correo electrónico" class="w-full sm:w-2/3 px-6 py-4 border border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-blue-600 text-gray-800 placeholder-gray-500">


                            <button class="w-full sm:w-auto px-6 py-4 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 hover:shadow-xl focus:ring-2 focus:ring-indigo-600 transition duration-300 ease-in-out">
                                Suscríbete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section id="search" class="container mx-auto px-8 lg:px-24 py-16 bg-indigo-100 rounded-xl shadow-lg" data-aos="fade-up">
            <h2 class="text-5xl font-bold text-center mb-12 text-indigo-700">
                Busca tu próxima oportunidad
            </h2>
            <div class="flex flex-col lg:flex-row items-center justify-center gap-6">
                <div class="relative w-full lg:w-2/3 flex">
                    <input type="text" placeholder="¿Qué trabajo buscas?" class="w-full px-6 py-4 border border-gray-300 rounded-l-lg shadow-md focus:ring-2 focus:ring-blue-600 text-gray-800 placeholder-gray-500">

                    <button class="absolute right-0 top-0 bottom-0 px-6 py-4 bg-indigo-600 text-white rounded-r-lg shadow-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-600 transition duration-300 ease-in-out flex items-center justify-center">
                       Buscar
                    </button>
                </div>

                <div class="relative group w-full lg:w-1/3">
                    <button class="w-full px-6 py-4 border border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-blue-600 flex justify-between items-center text-indigo-700">
                        <span class="text-gray-700">Categoría</span>
                        <i class="fas fa-chevron-down text-gray-600"></i>
                    </button>

                    <div class="absolute left-0 w-full bg-white shadow-md rounded-lg mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <ul class="text-gray-800">
                            <li class="px-6 py-4 hover:bg-indigo-100 flex items-center gap-3 cursor-pointer">
                                <i class="fas fa-laptop-code text-indigo-700 text-lg"></i>
                                <span>Tecnología</span>
                            </li>
                            <li class="px-6 py-4 hover:bg-indigo-100 flex items-center gap-3 cursor-pointer">
                                <i class="fas fa-heartbeat text-green-700 text-lg"></i>
                                <span>Salud</span>
                            </li>
                            <li class="px-6 py-4 hover:bg-indigo-100 flex items-center gap-3 cursor-pointer">
                                <i class="fas fa-chalkboard-teacher text-yellow-700 text-lg"></i>
                                <span>Educación</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="featured-jobs" class="container mx-auto px-8 lg:px-24 py-20">
            <h2 class="text-5xl font-bold text-center mb-16 text-gray-800" data-aos="fade-up">
                Vacantes Destacadas
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12">
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 border border-gray-200 overflow-hidden transform hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-indigo-700 mb-4">Desarrollador Web</h3>
                        <p class="text-gray-600 leading-relaxed mb-6">Desarrollo de aplicaciones web con tecnologías modernas y metodologías ágiles.</p>
                        <div class="flex items-center text-gray-500 gap-3">
                            <i class="fas fa-laptop-code text-indigo-700 text-2xl"></i>
                            <span class="text-lg">Tecnología</span>
                        </div>
                    </div>
                    <div class="bg-indigo-50 px-8 py-4 flex justify-between items-center">
                        <span class="text-indigo-700 font-semibold">Salario: $60,000 - $80,000</span>
                        <a href="#" class="text-indigo-600 font-medium hover:text-indigo-800">Ver más →</a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 border border-gray-200 overflow-hidden transform hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-indigo-700 mb-4">Enfermero/a</h3>
                        <p class="text-gray-600 leading-relaxed mb-6">Atención especializada en hospitales de prestigio con enfoque en el bienestar del paciente.</p>
                        <div class="flex items-center text-gray-500 gap-3">
                            <i class="fas fa-heartbeat text-indigo-700 text-2xl"></i>
                            <span class="text-lg">Salud</span>
                        </div>
                    </div>
                    <div class="bg-indigo-50 px-8 py-4 flex justify-between items-center">
                        <span class="text-indigo-700 font-semibold">Salario: $40,000 - $60,000</span>
                        <a href="#" class="text-indigo-600 font-medium hover:text-indigo-800">Ver más →</a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 border border-gray-200 overflow-hidden transform hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-indigo-700 mb-4">Profesor de Inglés</h3>
                        <p class="text-gray-600 leading-relaxed mb-6">Clases dinámicas para niveles intermedios y avanzados en instituciones educativas reconocidas.</p>
                        <div class="flex items-center text-gray-500 gap-3">
                            <i class="fas fa-book text-indigo-700 text-2xl"></i>
                            <span class="text-lg">Educación</span>
                        </div>
                    </div>
                    <div class="bg-indigo-50 px-8 py-4 flex justify-between items-center">
                        <span class="text-indigo-700 font-semibold">Salario: $30,000 - $50,000</span>
                        <a href="#" class="text-indigo-600 font-medium hover:text-indigo-800">Ver más →</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="available-jobs" class="container mx-auto px-8 lg:px-24 py-20">
            <h2 class="text-5xl font-bold text-center mb-16 text-gray-800" data-aos="fade-up">
                Vacantes Disponibles
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12">
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 border border-gray-200 overflow-hidden transform hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-blue-700 mb-4">Analista de Datos</h3>
                        <p class="text-gray-600 leading-relaxed mb-6">Análisis de grandes volúmenes de datos para mejorar la toma de decisiones empresariales.</p>
                        <div class="flex items-center text-gray-500 gap-3">
                            <i class="fas fa-chart-line text-blue-700 text-2xl"></i>
                            <span class="text-lg">Analítica</span>
                        </div>
                    </div>
                    <div class="bg-blue-50 px-8 py-4 flex justify-between items-center">
                        <span class="text-blue-700 font-semibold">Salario: $50,000 - $70,000</span>
                        <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Ver más →</a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 border border-gray-200 overflow-hidden transform hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-blue-700 mb-4">Diseñador Gráfico</h3>
                        <p class="text-gray-600 leading-relaxed mb-6">Creación de contenido visual atractivo para fortalecer la identidad de marca.</p>
                        <div class="flex items-center text-gray-500 gap-3">
                            <i class="fas fa-paint-brush text-blue-700 text-2xl"></i>
                            <span class="text-lg">Diseño</span>
                        </div>
                    </div>
                    <div class="bg-blue-50 px-8 py-4 flex justify-between items-center">
                        <span class="text-blue-700 font-semibold">Salario: $40,000 - $60,000</span>
                        <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Ver más →</a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 border border-gray-200 overflow-hidden transform hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-blue-700 mb-4">Contador Público</h3>
                        <p class="text-gray-600 leading-relaxed mb-6">Gestión financiera y asesoramiento fiscal para empresas nacionales e internacionales.</p>
                        <div class="flex items-center text-gray-500 gap-3">
                            <i class="fas fa-calculator text-blue-700 text-2xl"></i>
                            <span class="text-lg">Finanzas</span>
                        </div>
                    </div>
                    <div class="bg-blue-50 px-8 py-4 flex justify-between items-center">
                        <span class="text-blue-700 font-semibold">Salario: $45,000 - $65,000</span>
                        <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Ver más →</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="area-jobs" class="container mx-auto px-8 lg:px-24 py-20 bg-gray-100">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800" data-aos="fade-up">
                Encuentra vacantes en tu área
            </h2>
            <div class="flex flex-wrap justify-center gap-6">

                <div class="bg-indigo-700 text-white px-8 py-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300 flex items-center gap-4">
                    <i class="fas fa-laptop-code text-3xl"></i>
                    <span class="text-xl">Tecnología</span>
                </div>

                <div class="bg-green-700 text-white px-8 py-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300 flex items-center gap-4">
                    <i class="fas fa-heartbeat text-3xl"></i>
                    <span class="text-xl">Salud</span>
                </div>

                <div class="bg-yellow-700 text-white px-8 py-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300 flex items-center gap-4">
                    <i class="fas fa-chalkboard-teacher text-3xl"></i>
                    <span class="text-xl">Educación</span>
                </div>
            </div>
        </section>
    </main>

    <x-footer />
</body>
