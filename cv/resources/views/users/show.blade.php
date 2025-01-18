<body class="font-inter bg-gray-100 min-h-screen">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
            <x-side-menu />
        </div>

        <div class="flex-1 flex flex-col">
            @auth

                <div class="flex items-center space-x-4 mb-12">
                    <x-profile />
                </div>

                <!-- User Information -->
                <div class="container mx-auto p-8 bg-white rounded-lg shadow-lg mt-6">
                    <h1 class="text-4xl font-bold text-gray-800 mb-6">
                        Perfil de {{ $user->first_name }} {{ $user->last_name }}
                    </h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <p class="text-lg text-gray-700"><strong>Email:</strong> {{ $user->email }}</p>
                        <p class="text-lg text-gray-700"><strong>Nombre de Usuario:</strong> {{ $user->user_name }}</p>
                        <p class="text-lg text-gray-700"><strong>Dirección:</strong> {{ $user->address }}</p>
                        <p class="text-lg text-gray-700"><strong>Fecha de Nacimiento:</strong> {{ $user->date_of_birth }}</p>
                        <p class="text-lg text-gray-700"><strong>Rol:</strong> {{ $user->role->name }}</p>
                        <p class="text-lg text-gray-700"><strong>Nacionalidad:</strong> {{ $user->nacionalidad->nacionalidad }}</p>
                        <p class="text-lg text-gray-700"><strong>Facebook:</strong>
                            <span class="text-blue-500">{{ $user->facebook ?? 'No disponible' }}</span>
                        </p>
                        <p class="text-lg text-gray-700"><strong>Instagram:</strong>
                            <span class="text-pink-500">{{ $user->instagram ?? 'No disponible' }}</span>
                        </p>
                        <p class="text-lg text-gray-700"><strong>X:</strong>
                            <span class="text-gray-500">{{ $user->x ?? 'No disponible' }}</span>
                        </p>
                        <p class="text-lg text-gray-700"><strong>TikTok:</strong>
                            <span class="text-black">{{ $user->tiktok ?? 'No disponible' }}</span>
                        </p>
                        <p class="text-lg text-gray-700"><strong>Descripción:</strong> {{ $user->descripcion ?? 'No disponible' }}</p>
                        <p class="text-lg text-gray-700"><strong>Número de Publicaciones:</strong>
                            <span class="text-green-600">{{ $user->publications->count() ?? 'No tiene publicaciones' }}</span>
                        </p>
                        <p class="text-lg text-gray-700"><strong>Cantidad de Páginas:</strong>
                            @if ($user->role->name === 'Publisher')
                                <span class="text-orange-600">No está autorizado</span>
                            @else
                                <span class="text-green-600">{{ $user->pages->count() }}</span>
                            @endif
                        </p>
                    </div>
                </div>
                <!-- Featured Publications -->
                    <div class="container mx-auto p-8 bg-gray-50 mt-8 rounded-lg shadow-lg">
                        <h2 class="text-3xl font-bold text-gray-800 mb-6">Publicaciones Destacadas</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @forelse ($randomPublications as $publication)
                                <div class="bg-white border border-gray-200 p-6 rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $publication->title }}</h3>
                                    <p class="text-gray-600">{!! $publication->content !!}</p>
                                    <a href="{{ route('publications.show', $publication->idpublications) }}" class="text-blue-600 hover:underline mt-4 block">Leer más</a>
                                </div>
                            @empty
                                <p class="text-gray-500">No hay publicaciones destacadas disponibles.</p>
                            @endforelse
                        </div>
                    </div>

                <!-- Back to List Button -->
                <div class="container mx-auto mt-8">
                    <a href="{{ route('users.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700 transition duration-300">
                        Volver a la lista
                    </a>
                </div>
            @endauth
        </div>
    </div>

</body>
