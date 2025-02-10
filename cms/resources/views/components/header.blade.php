<header class="bg-white shadow-lg">
    <nav class="flex justify-between items-center max-w-screen-xl mx-auto p-6">
        <!-- Logo e Identidad -->
        <div class="flex items-center">
            <i class="fas fa-briefcase text-indigo-700 text-2xl mr-3"></i>
            <h1 class="text-xl font-bold text-gray-800">Búsqueda de empleo en LATAM</h1>
        </div>

        <!-- Menú Desktop -->
        <div class="hidden md:flex ml-10 space-x-8">
            <ul class="flex items-center space-x-6">
                <li>
                    <a href="{{ route('HomePage') }}" class="text-sm text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                        <i class="fa-solid fa-house mr-2"></i>
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('Blog') }}" class="text-sm text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                        <i class="fa-solid fa-book mr-2"></i>
                        Blog
                    </a>
                </li>
                <li>
                    <a href="{{ route('SobreNosostros') }}" class="text-sm text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                        <i class="fa-solid fa-users mr-2"></i>
                        Sobre Nosotros
                    </a>
                </li>
                <li>
                    <a href="{{ route('Contactanos') }}" class="text-sm text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                        <i class="fa-solid fa-phone"></i>
                        Contáctanos
                    </a>
                </li>
            </ul>
        </div>

        <!-- Botón Menú Móvil -->
        <div class="md:hidden flex items-center">
            <button id="hamburger" class="text-gray-700 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </nav>

    <!-- Menú Móvil -->
    <div id="mobileMenu" class="hidden bg-white shadow-lg absolute w-full left-0 z-50 transition-all duration-300 ease-in-out">
        <ul class="space-y-4 p-6">
            <li>
                <a href="{{ route('HomePage') }}" class="text-sm text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                    <i class="fa-solid fa-house mr-2"></i>
                    Inicio
                </a>
            </li>
            <li>
                <a href="{{ route('Blog') }}" class="text-sm text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                    <i class="fa-solid fa-book mr-2"></i>
                    Blog
                </a>
            </li>
            <li>
                <a href="{{ route('SobreNosostros') }}" class="text-sm text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                    <i class="fa-solid fa-users mr-2"></i>
                    Sobre Nosotros
                </a>
            </li>
            <li>
                <a href="{{ route('Contactanos') }}" class="text-sm text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                    <i class="fa-solid fa-phone"></i>
                    Contáctanos
                </a>
            </li>
        </ul>
    </div>
</header>

<script>
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');

    hamburger.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('opacity-0');
        mobileMenu.classList.toggle('opacity-100');
        mobileMenu.classList.toggle('-translate-y-full');
        mobileMenu.classList.toggle('translate-y-0');
    });
</script>
