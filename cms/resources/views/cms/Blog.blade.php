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

                <!-- Mostrar publicaciones si existen, o mensaje si no hay -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($publications as $publication)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
                            <img src="{{ asset('storage/' . $publication->image) }}" alt="{{ $publication->title }}" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-800 hover:text-indigo-600 transition duration-300">
                                    {{ $publication->title }}
                                </h2>
                                <p class="mt-3 text-gray-600">
                                    {!! $publication->content !!}
                                </p>

                                <!-- Información del autor y fecha -->
                                <div class="mt-4 text-sm text-gray-500">
                                    <p>Publicado por: {{ $publication->user->first_name }} {{ $publication->user->last_name }}</p>
                                    <p>Fecha de publicación: {{ \Carbon\Carbon::parse($publication->fecha_publicacion)->format('d/m/Y') }}</p>
                                </div>

                                <!-- Mostrar la categoría de la publicación debajo de la fecha -->
                                @if($publication->categoria) <!-- Este es el campo que contiene la categoría -->
                                    <div class="text-sm font-medium text-indigo-600 mt-4">
                                        Categoría: {{ $publication->categoria }}
                                    </div>
                                @endif

                                <!-- Botón de "Leer más" -->

                            </div>
                        </div>
                    @empty
                        <!-- Si no hay publicaciones -->
                        <div class="col-span-3 text-center">
                            <p class="text-lg text-gray-600">No hay publicaciones disponibles en este momento.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Paginación -->
                @if($publications->count() > 0)
                    <div class="mt-8">
                        {{ $publications->links() }}
                    </div>
                @endif

            </div>
        </section>
    </main>

    <x-footer />
</div>
