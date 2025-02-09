<!-- resources/views/cms/Blog.blade.php -->

<div class="flex flex-col min-h-screen">
    <x-navbar />

    <main class="flex-grow">
        <section class="bg-gray-100 py-8">
            <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="text-center mb-12">
                    <h1 class="text-4xl font-extrabold text-gray-800 leading-tight">
                        Blog
                    </h1>
                    <p class="mt-4 text-lg text-gray-600">
                        Explora consejos, noticias y recursos para encontrar las mejores oportunidades laborales en la región.
                    </p>
                </div>

                <!-- Mostrar publicaciones -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                    <!-- Primer blog -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
                        <img src="https://via.placeholder.com/400x250" alt="Imagen del blog 1" class="w-full h-48 object-cover">

                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-800 hover:text-indigo-600 transition duration-300">
                                Título del Blog 1
                            </h2>
                            <p class="mt-3 text-gray-600">
                                Esta es una breve descripción del contenido del blog 1. Aquí puedes añadir un resumen o extracto del artículo.
                            </p>

                            <div class="mt-4 text-sm text-gray-500">
                                <p>Publicado por: Juan Pérez</p>
                                <p>Fecha de publicación: 22/01/2025</p>
                            </div>

                            <div class="text-sm font-medium text-indigo-600 mt-4">
                                Categoría: Tecnología
                            </div>

                            <div class="mt-4">
                                <a href="#" class="text-indigo-600 font-semibold hover:text-indigo-800 transition duration-300">
                                    Leer más &rarr;
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Segundo blog -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
                        <img src="https://via.placeholder.com/400x250" alt="Imagen del blog 2" class="w-full h-48 object-cover">

                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-800 hover:text-indigo-600 transition duration-300">
                                Título del Blog 2
                            </h2>
                            <p class="mt-3 text-gray-600">
                                Esta es una breve descripción del contenido del blog 2. Aquí puedes añadir un resumen o extracto del artículo.
                            </p>

                            <div class="mt-4 text-sm text-gray-500">
                                <p>Publicado por: Laura González</p>
                                <p>Fecha de publicación: 15/01/2025</p>
                            </div>

                            <div class="text-sm font-medium text-indigo-600 mt-4">
                                Categoría: Emprendimiento
                            </div>

                            <div class="mt-4">
                                <a href="#" class="text-indigo-600 font-semibold hover:text-indigo-800 transition duration-300">
                                    Leer más &rarr;
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Tercer blog -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
                        <img src="https://via.placeholder.com/400x250" alt="Imagen del blog 3" class="w-full h-48 object-cover">

                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-800 hover:text-indigo-600 transition duration-300">
                                Título del Blog 3
                            </h2>
                            <p class="mt-3 text-gray-600">
                                Esta es una breve descripción del contenido del blog 3. Aquí puedes añadir un resumen o extracto del artículo.
                            </p>

                            <div class="mt-4 text-sm text-gray-500">
                                <p>Publicado por: Mario Rodríguez</p>
                                <p>Fecha de publicación: 10/01/2025</p>
                            </div>

                            <div class="text-sm font-medium text-indigo-600 mt-4">
                                Categoría: Desarrollo Personal
                            </div>

                            <div class="mt-4">
                                <a href="#" class="text-indigo-600 font-semibold hover:text-indigo-800 transition duration-300">
                                    Leer más &rarr;
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Paginación -->
                <div class="mt-8">
                    <!-- Aquí puedes agregar los enlaces de paginación si los necesitas -->
                </div>

            </div>
        </section>
    </main>

    <x-footer />
</div>
