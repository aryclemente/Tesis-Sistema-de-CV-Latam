<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Páginas</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body class="font-inter bg-gray-50">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 h-full bg-gray-900 text-white transition-transform lg:block fixed">
            <x-side-menu />
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col bg-gray-100 lg:pl-64 pl-0">
            <!-- Header -->
            <div class="h-14 text-white flex items-center justify-between z-20">
                <x-profile />
            </div>

            <div class="container mx-auto p-6">
                <h1 class="text-3xl font-bold mb-6 text-gray-800">Lista de Páginas</h1>

                <div class="mb-4">
                    <a href="{{ route('pages.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Nueva Página</a>
                </div>

                <!-- Filtro por Estado -->
                <div class="mb-4">
                    <form method="GET" class="flex items-center">
                        <label for="status" class="text-lg font-medium text-gray-700 mr-3">Estado:</label>
                        <select name="status" id="status" class="px-4 py-2 border rounded-lg" onchange="this.form.submit()">
                            <option value="all" {{ $status === 'all' ? 'selected' : '' }}>Todos</option>
                            <option value="draft" {{ $status === 'draft' ? 'selected' : '' }}>Borrador</option>
                            <option value="published" {{ $status === 'published' ? 'selected' : '' }}>Publicado</option>
                            <option value="archived" {{ $status === 'archived' ? 'selected' : '' }}>Archivado</option>
                        </select>
                    </form>
                </div>

                <!-- Mostrar el mensaje de éxito -->
                @if(session('success'))
                    <div class="bg-green-100 text-green-800 p-4 mb-6 rounded-lg border-l-4 border-green-500">
                        <p class="font-medium">{{ session('success') }}</p>
                    </div>
                @endif

                <!-- Mostrar Páginas -->
                <div class="overflow-x-auto bg-white shadow-md rounded-lg border border-gray-200 mb-6">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Título</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Estado</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($pages as $page)
                                <tr class="hover:bg-gray-50 transition duration-200 ease-in-out">
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $page->title }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">
                                        @switch($page->status)
                                            @case('draft')
                                                <span class="px-2 py-1 text-xs font-semibold text-yellow-600 bg-yellow-100 rounded-full">Borrador</span>
                                                @break
                                            @case('published')
                                                <span class="px-2 py-1 text-xs font-semibold text-green-600 bg-green-100 rounded-full">Publicado</span>
                                                @break
                                            @case('archived')
                                                <span class="px-2 py-1 text-xs font-semibold text-gray-600 bg-gray-100 rounded-full">Archivado</span>
                                                @break
                                        @endswitch
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-800 flex space-x-4">
                                        <a href="{{ route('pages.show', $page->id) }}" class="text-green-600 hover:text-green-800 transition duration-200">Vista</a>

                                        <a href="{{ route('pages.edit', $page->id) }}" class="text-blue-600 hover:text-blue-800 transition duration-200">Editar</a>
                                        <form action="{{ route('pages.destroy', $page->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 transition duration-200">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Mensaje cuando no hay publicaciones -->
                @if($pages->isEmpty())
                    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg">
                        <p class="text-sm font-medium">No se han creado publicaciones.</p>
                    </div>
                @endif

                <!-- Paginación -->
                <div class="mt-6">
                    <div class="flex justify-center">
                        {{ $pages->appends(['status' => $status])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
