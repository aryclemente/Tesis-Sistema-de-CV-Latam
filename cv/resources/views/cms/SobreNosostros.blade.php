<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">
    <x-navbar/>

    <main class="flex-grow">
        <h1 class="text-4xl font-bold text-center mt-8">Sobre Nosotros</h1>

        <h2 class="text-lg text-center mt-4 text-gray-700">Bienvenidos a la página de Sobre Nosotros. Aquí encontrarás información sobre nuestra misión, visión, equipo, historia y valores, enfocados en la búsqueda de empleo en Latinoamérica.</h2>

        <!-- Aquí es donde se mostrarán las publicaciones -->
        <section class="mt-8 px-4 grid grid-cols-1 sm:grid-cols-2 gap-8 mb-12">
            @foreach($publications as $publication)
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center hover:shadow-2xl transition-shadow duration-300">
                    <div class="flex items-center mb-4 w-full bg-gradient-to-r from-indigo-600 to-indigo-500 text-white py-3 px-4 rounded-t-lg shadow-lg">
                        <h2 class="text-2xl font-semibold flex-grow text-center">{{ $publication->title }}</h2>
                    </div>
                    <h3 class="text-center text-gray-600 text-lg mb-4">
                        {!! $publication->content !!}
                    </h3>
                </div>
            @endforeach
        </section>

        <!-- Sección de comentarios -->
       <!-- Sección de comentarios -->
<h2 class="text-4xl font-bold text-center mt-8">Lo que dicen nuestros usuarios</h2>
<section class="mt-8 px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
    @foreach($comments as $comment)
        <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center hover:shadow-2xl transition-shadow duration-300">
            <div class="mb-4">
                <i class="fa-solid fa-quote-left text-gray-600 text-4xl"></i>
            </div>
            <h3 class="text-center text-gray-600 text-lg mb-4">
                "{{ $comment->coment }}" <!-- Contenido del comentario -->
            </h3>

            <!-- Verificar si el comentario tiene un usuario asociado -->
            @if($comment->user)
                <p class="text-center text-gray-500 text-md mt-4">
                    - {{ $comment->user->full_name }} <!-- Nombre del usuario que dejó el comentario -->
                </p>
            @else
                <p class="text-center text-gray-500 text-md mt-4">
                    - Anónimo <!-- En caso de que no haya un usuario asociado -->
                </p>
            @endif
        </div>
    @endforeach
</section>


    </main>

    <x-footer/>
</body>
