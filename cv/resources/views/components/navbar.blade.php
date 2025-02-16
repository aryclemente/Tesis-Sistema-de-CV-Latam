<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">

<header class="bg-white shadow-lg">
    <nav class="flex justify-between items-center max-w-screen-xl mx-auto p-6">

        <div class="flex items-center">
            <i class="fas fa-briefcase text-indigo-700 text-2xl mr-3"></i>
            <h1 class="text-xl font-bold text-gray-800">Búsqueda de empleo en LATAM</h1>
        </div>

        <div class="hidden md:block mx-6 border-l border-gray-300 h-8"></div>

        <div class="hidden md:flex ml-10 space-x-8">
            <ul class="flex items-center space-x-4">
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

        <div class="hidden md:flex ml-10">
            <ul class="flex gap-6">
                <li>
                    <a href="{{ route('login') }}">
                        <button class="px-5 py-2 text-lg font-medium text-indigo-700 bg-white border-2 border-indigo-700 rounded-full shadow-md hover:bg-indigo-50 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-300">
                            <i class="fa-solid fa-user mr-2"></i>
                            Iniciar Sesión
                        </button>
                    </a>
                </li>
                <li>
                    <a href="{{ route('register') }}">
                        <button class="px-5 py-2 text-lg font-medium text-white bg-indigo-700 rounded-full shadow-md hover:bg-indigo-800 transition duration-300 ease-in-out transform hover:scale-110 focus:ring focus:ring-indigo-500">
                            <i class="fa-solid fa-user-plus"></i>
                            Registrarse
                        </button>
                    </a>
                </li>
            </ul>
        </div>

        <div class="md:hidden flex items-center">
            <button id="hamburger" class="text-gray-700 hover:text-indigo-600">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </nav>

    <div id="mobileMenu" class="hidden md:hidden bg-white shadow-lg">
        <ul class="space-y-4 p-6">
            <li>
                <a href="{{ route('HomePage') }}" class="text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                    <i class="fa-solid fa-house mr-2"></i>
                    Inicio
                </a>
            </li>
            <li>
                <a href="{{ route('Blog') }}" class="text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                    <i class="fa-solid fa-book mr-2"></i>
                    Blog
                </a>
            </li>
            <li>
                <a href="{{ route('SobreNosostros') }}" class="text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                    <i class="fa-solid fa-users mr-2"></i>
                    Sobre Nosotros
                </a>
            </li>
            <li>
                <a href="{{ route('Contactanos') }}" class="text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                    <i class="fa-solid fa-phone"></i>
                    Contáctanos
                </a>
            </li>
        </ul>
        <div class="flex flex-col gap-4 mt-4">
            <a href="{{ route('login') }}">
                <button class="px-5 py-2 w-full text-lg font-medium text-indigo-700 bg-white border-2 border-indigo-700 rounded-full shadow-md hover:bg-indigo-50 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-300">
                    <i class="fa-solid fa-user mr-2"></i>
                    Iniciar Sesión
                </button>
            </a>
            <a href="{{ route('register') }}">
                <button class="px-5 py-2 w-full text-lg font-medium text-white bg-indigo-700 rounded-full shadow-md hover:bg-indigo-800 transition duration-300 ease-in-out transform hover:scale-110 focus:ring focus:ring-indigo-500">
                    <i class="fa-solid fa-user-plus"></i>
                    Registrarse
                </button>
            </a>
        </div>
    </div>
</header>

<script>
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');

    hamburger.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>

</body>
</html>
