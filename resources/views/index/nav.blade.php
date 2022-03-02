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
    <div class="w-full flex justify-between py-6 px-6 bg-azul-principal items-center">
        <a href="{{ url('/') }}">
            <h1 class="font-bold text-3xl grid">
                <span>Grind</span>
                <span>SkateShop</span>
            </h1>
        </a>

        <div class="flex justify-between text-lg">
            <a class="mx-6" href="#">Tablas</a>
            <a class="mx-6" href="#">Ejes</a>
            <a class="mx-6" href="#">Ruedas</a>
            <a class="mx-6" href="#">Marcas</a>
            <a class="mx-6" href="#">Sobre Nosotros</a>
        </div>

        <div class="flex text-lg">
            <a href="#">Login</a>
        </div>
    </div>

    <main class="w-4/5 my-8 m-auto bg-azul-claro">
        @yield('content')
    </main>
</body>
</html>