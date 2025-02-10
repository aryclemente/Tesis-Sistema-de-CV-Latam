<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Usuarios</title>
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
                <h1 class="text-3xl font-bold mb-6 text-gray-800">Lista de Usuarios</h1>

                <div class="mb-4">
                    <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Nuevo Usuario</a>
                </div>

                <!-- Filtro por Rol -->


                <!-- Mostrar Usuarios -->
                <div class="overflow-x-auto bg-white shadow-md rounded-lg border border-gray-200 mb-6">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Nombre de Usuario</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Email</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Dirección</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Nro de Publicaciones</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Rol</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Fecha de Nacimiento</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Nro de Páginas</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-50 transition duration-200 ease-in-out">
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $user->user_name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $user->email }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $user->address ?? 'No disponible' }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $user->publications->count() ?? 'No disponible' }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $user->role->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $user->date_of_birth }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">
                                        @if ($user->roles_idroles === 1)
                                            {{ $user->pages->count() }} <!-- Muestra la cantidad de páginas creadas -->
                                        @elseif ($user->roles_idroles === 2)
                                            No está autorizado
                                        @else
                                            No disponible
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-800 flex space-x-4">
                                        <a href="{{ route('users.show', $user->idusers) }}" class="text-green-600 hover:text-green-800 transition duration-200">Vista</a>

                                        <!-- Edit and Delete Actions -->
                                        @if($user->roles_idroles === 1)
                                            <!-- User with admin role cannot be edited or deleted -->
                                            <button type="button" class="text-blue-600 cursor-not-allowed opacity-50" disabled>Editar</button>
                                            <button type="button" class="text-red-600 cursor-not-allowed opacity-50" disabled>Eliminar</button>
                                        @else
                                            <a href="{{ route('users.edit', $user->idusers) }}" class="text-blue-600 hover:text-blue-800 transition duration-200">Editar</a>

                                            <form action="{{ route('users.destroy', $user->idusers) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 transition duration-200">Eliminar</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Mensaje cuando no hay usuarios -->
                @if($users->isEmpty())
                    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg">
                        <p class="text-sm font-medium">No se han creado usuarios.</p>
                    </div>
                @endif

                <!-- Paginación -->

            </div>
        </div>
    </div>

</body>

</html>
