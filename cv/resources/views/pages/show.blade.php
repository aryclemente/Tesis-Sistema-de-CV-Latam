<body class="font-inter bg-gray-100 min-h-screen">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
            <x-side-menu />
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col bg-gray-50">
            @auth
            <!-- Profile Section -->
            <div class="flex items-center space-x-4 p-4 bg-white shadow-md border-b border-gray-200">
                <x-profile />
            </div>

            <!-- Page Detail Section -->
            <div class="container mx-auto p-8 bg-white rounded-xl shadow-lg mt-8 max-w-4xl">
                <h1 class="text-4xl font-semibold text-gray-800 mb-6">Detalles de la Página</h1>

                <!-- Page Data -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-2">Título:</h2>
                    <p class="text-gray-600 text-lg">{{ $page->title }}</p>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-2">Slug</h2>
                    <p class="text-gray-600 text-lg">
                        <a href="{{ url($page->slug) }}" class="text-indigo-600 hover:underline" target="_blank">
                            {{ url($page->slug) }}
                        </a>
                    </p>
                </div>


                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-2">Estado:</h2>
                    <p class="text-gray-600 text-lg">{{ $page->status }}</p>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-2">Contenido:</h2>
                    <div class="text-gray-600 text-lg" style="white-space: pre-line;">{!! $page->content !!}</div>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-2">Descripcion</h2>
                    <div class="text-gray-600 text-lg" style="white-space: pre-line;">{!! $page->description !!}</div>
                </div>

                <!-- Author Info -->
                <div class="mt-8 p-6 bg-gray-50 rounded-lg shadow-sm">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Creado por:</h2>
                    <p class="text-gray-600 text-lg">{{ $page->user->first_name }} {{ $page->user->last_name }}</p>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex space-x-4">
                    <a href="{{ route('pages.index') }}" class="px-6 py-2 text-white bg-indigo-600 rounded-md shadow-md hover:bg-indigo-700 transition duration-200">Volver a la lista</a>
                    <a href="{{ route('pages.edit', $page->id) }}" class="px-6 py-2 text-white bg-blue-600 rounded-md shadow-md hover:bg-blue-700 transition duration-200">Editar Página</a>
                </div>
            </div>
            @endauth
        </div>
    </div>
</body>
