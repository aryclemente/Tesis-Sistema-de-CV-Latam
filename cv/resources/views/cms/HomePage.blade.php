<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col font-sans">

    <x-navbar />

    <main class="flex-grow">

        <div class="bg-gradient-to-br from-blue-700 to-indigo-800 text-white py-28 shadow-lg">
            <div class="container mx-auto px-6 lg:px-16 text-center">
                <h1 class="text-5xl font-extrabold leading-tight tracking-tight animate-fadeInDown">
                    Bienvenidos a nuestra página de búsqueda de empleo
                </h1>
                <p class="text-lg lg:text-xl mt-6 font-medium max-w-3xl mx-auto leading-relaxed">
                    Conectamos a los mejores talentos con las oportunidades laborales ideales para su crecimiento
                    profesional. Nuestra misión es ser el puente entre el éxito y tus metas.
                </p>
                <div class="mt-10">
                    <a href="{{ route('public.index')}}" class="px-8 py-4 bg-white text-blue-700 font-semibold rounded-lg shadow-lg hover:bg-blue-600 hover:text-white hover:shadow-2xl hover:scale-105 transition duration-300 ease-in-out">
                        Descubre nuestros servicios
                    </a>
                </div>
            </div>
        </div>

        <section id="services" class="container mx-auto px-6 lg:px-16 py-24">
            <h2 class="text-4xl font-bold text-gray-800 text-center mb-16">
                Nuestros Servicios
            </h2>

            @if($publications->isEmpty())
                <p class="text-center text-gray-600">No hay publicaciones disponibles en la categoría Servicios.</p>
            @else
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-16">
                    @foreach($publications as $publication)
                        <div class="bg-white rounded-lg shadow-xl p-8 hover:shadow-2xl transition duration-300">
                            <h3 class="text-2xl font-semibold text-indigo-600 mb-4">{{ $publication->title }}</h3>
                            <p class="text-gray-600">
                                {!! $publication->content !!}
                            </p>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>

    </main>
    <x-footer />

</body>
