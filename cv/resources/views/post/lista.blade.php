<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body class="font-inter bg-gray-100">
    <div class="flex h-screen">
        <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
            <x-side-menu />
        </div>

        <div class="flex-1 flex flex-col">
            <div class="flex items-center space-x-4 mb-12">
                <x-profile />
            </div>
            <div class="container mx-auto p-8 bg-white rounded-lg shadow-lg">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Lista de Publicaciones</h1>

                <!-- Filtro por Publicadores -->
                <form method="GET" action="{{ route('posts.lista') }}" class="mb-6">
                    <label for="publisher_id" class="block text-lg font-medium text-gray-700 mb-2">Publicadores:</label>
                    <select name="publisher_id" id="publisher_id" class="w-full p-2 border border-gray-300 rounded-lg">
                        <option value="">Todos</option>
                        @foreach($publishers as $publisher)
                            <option value="{{ $publisher->idusers }}" {{ request('publisher_id') == $publisher->idusers ? 'selected' : '' }}>
                                {{ $publisher->first_name }} {{ $publisher->last_name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                        Buscar publicación
                    </button>
                </form>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach(['Publicado', 'Borrador', 'Programado'] as $estado)
                        <div class="col-span-1">
                            <h2 class="text-2xl font-semibold text-gray-700 mb-4">{{ $estado }}</h2>

                            @forelse($posts[$estado] as $post)
                                <div class="bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition duration-300">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $post->title }}</h3>
                                    <p class="text-gray-700"> {!! $post->content !!} </p>
                                    <span class="block text-sm text-gray-500 mt-2">Creado por: {{ $post->user->first_name }} {{ $post->user->last_name }}</span>
                                    <a href="{{ route('posts.show', ['id' => $post->idpublications]) }}" class="text-blue-600 hover:underline mt-4 block">Leer más</a>
                                </div>
                            @empty
                                <p class="text-gray-500">No hay publicaciones en estado "{{ $estado }}".</p>
                            @endforelse

                            <div class="mt-4">
                                {{ $posts[$estado]->appends(request()->query())->links() }}
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</body>

</html>
