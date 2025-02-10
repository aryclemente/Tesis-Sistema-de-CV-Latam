<body class="flex flex-col min-h-screen bg-gradient-to-br from-gray-100 to-gray-200 text-gray-800">

    <x-navbar/>

    <main class="flex-grow">
        <div class="container mx-auto px-6 sm:px-10 lg:px-16 py-12">
            <div class="text-center mb-12">
                <h1 class="text-5xl font-extrabold text-gray-900 leading-tight">Contáctanos</h1>
                <p class="text-xl text-gray-700 mt-4">Estamos aquí para resolver tus dudas y escuchar tus comentarios</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="bg-white p-10 shadow-xl rounded-lg">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Envíanos un mensaje</h2>
                    <form id="contactForm" class="space-y-6" method="POST" action="{{ route('store.contacto') }}">
                        @csrf <!-- Protección contra CSRF -->

                        <div>
                            <label for="nombre" class="block text-lg font-medium text-gray-700">Nombre Completo</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
                        </div>
                        <div>
                            <label for="correo" class="block text-lg font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="correo" placeholder="Tu email" class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
                        </div>

                        <div>
                            <label for="mensaje" class="block text-lg font-medium text-gray-700">Mensaje</label>
                            <textarea id="mensaje" name="mensaje" rows="6" placeholder="Tu mensaje" class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600" required></textarea>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="px-8 py-4 bg-indigo-700 text-white font-semibold rounded-full shadow-lg hover:bg-indigo-800 transition duration-300">
                                Enviar Mensaje
                            </button>
                        </div>
                        <div id="successMessage" class="mt-6 text-green-600 font-medium text-center hidden">
                            ¡Mensaje enviado con éxito!
                        </div>

                        @if (session('success'))
                            <div class="mt-6 text-green-600 font-medium text-center">
                                {{ session('success') }}
                            </div>
                        @endif

                    </form>

                </div>

                <div class="bg-gradient-to-r from-indigo-500 to-indigo-700 text-white p-10 shadow-xl rounded-lg">
                    <h2 class="text-2xl font-semibold mb-6">Información de Contacto</h2>
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="bg-white p-4 rounded-full hover hover:ring-indigo-500 hover:ring-offset-2 hover:ring-4 transition duration-300">
                                <i class="fas fa-envelope text-indigo-700 text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">Horario</h4>
                                <span class="text-gray-100">Lunes a Viernes: 9:00 AM - 6:00 PM</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="bg-white p-4 rounded-full hover hover:ring-indigo-500 hover:ring-offset-2 hover:ring-4 transition duration-300">
                                <i class="fas fa-phone-alt text-indigo-700 text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">Teléfono</h4>
                                <span class="text-gray-100">+58 0212 873 2535</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="bg-white p-4 rounded-full hover: hover:ring-indigo-500 hover:ring-offset-2 hover:ring-4 transition duration-300">
                                <i class="fas fa-map-marker-alt text-indigo-700 text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">Dirección</h4>
                                <span class="text-gray-100">Plaza Bolívar, Caracas, Venezuela</span>
                            </div>
                        </div>

                        <div id="map" class="w-full h-96 rounded-lg shadow"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <x-footer/>

    <!-- Leaflet.js -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        // Configuración del mapa con Leaflet.js
        document.addEventListener('DOMContentLoaded', () => {
            const map = L.map('map').setView([10.5061, -66.9146], 15); // Coordenadas de la Plaza Bolívar

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Agregar un marcador
            L.marker([10.5061, -66.9146]).addTo(map)
                .bindPopup('Plaza Bolívar, Caracas, Venezuela')
                .openPopup();
        });

        function handleFormSubmit(event) {
            event.preventDefault();

            const nombre = document.getElementById('nombre').value;
            const email = document.getElementById('email').value;
            const mensaje = document.getElementById('mensaje').value;

            const formData = {
                nombre,
                email,
                mensaje,
            };

            localStorage.setItem('formData', JSON.stringify(formData));

            const successMessage = document.getElementById('successMessage');
            successMessage.classList.remove('hidden');
            successMessage.classList.add('block');
        }
    </script>
</body>
