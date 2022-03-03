<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Favicon de la pagina --}}
    <link rel="icon" type="image/x-icon" href="http://localhost/grind-skateshop/resources/img/favicon.png">

    {{-- Custom CSS Tailwind --}}
    <link rel="stylesheet" href="css/app.css">

    <title>Grind SkateShop</title>

</head>
<body class="bg-fondo">
    <div class="flex items-center justify-between w-full px-6 py-6 bg-azul-principal">
        <a href="{{ url('/') }}">
            <h1 class="grid text-3xl font-bold">
                <span>Grind</span>
                <span>SkateShop</span>
            </h1>
        </a>

        <div class="flex justify-between text-lg">
            <a class="mx-6 font-semibold hover:text-white hover:underline" href="#">Tablas</a>
            <a class="mx-6 font-semibold hover:text-white hover:underline" href="#">Ejes</a>
            <a class="mx-6 font-semibold hover:text-white hover:underline" href="#">Ruedas</a>
            <a class="mx-6 font-semibold hover:text-white hover:underline" href="#">Marcas</a>
            <a class="mx-6 font-semibold hover:text-white hover:underline" href="#">Sobre Nosotros</a>
        </div>

        <div
            class="flex items-center justify-between p-2 text-lg bg-white rounded-md cursor-pointer hover:bg-blue-500 hover:text-white">
            <a href="#" class="mr-4">Iniciar Sesion</a>
            <x-fas-user class="w-4 h-4" />
        </div>
    </div>

    <main class="w-4/5 m-auto my-8 rounded-lg bg-azul-claro">
        @yield('content')
    </main>
</body>
</html>