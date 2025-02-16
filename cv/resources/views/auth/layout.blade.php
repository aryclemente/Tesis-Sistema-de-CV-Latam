<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
     
</head>
<body class="bg-gradient-to-r from-blue-100 to-indigo-100 dark:bg-gradient-to-tr dark:from-indigo-900 dark:to-slate-900 text-black dark:text-white">
    <x-header/>
    @yield('content')
    @stack('scripts')
</body>
</html>
