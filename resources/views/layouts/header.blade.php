<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Favicon de la pagina --}}
    <link rel="icon" type="image/x-icon" href="http://localhost/grind-skateshop/resources/img/favicon.png">

    {{-- Custom CSS Tailwind --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

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
            <a class="mx-6 font-semibold duration-300 hover:text-white hover:underline" href="{{ url('tablas') }}">{{ __('Tablas') }}</a>
            <a class="mx-6 font-semibold duration-300 hover:text-white hover:underline" href="{{ url('ejes') }}">{{ __('Ejes') }}</a>
            <a class="mx-6 font-semibold duration-300 hover:text-white hover:underline" href="{{ url('ruedas') }}">{{ __('Ruedas') }}</a>
            <a class="mx-6 font-semibold duration-300 hover:text-white hover:underline" href="{{ url('marcas') }}">{{ __('Marcas') }}</a>
            <a class="mx-6 font-semibold duration-300 hover:text-white hover:underline" href="#">Sobre Nosotros</a>
        </div>

        @if (Auth::check())

            <div class="flex items-center justify-around w-1/5 space-x-4">

                <a id="profile" href="{{ url('/profile') }}" class="flex items-center justify-around space-x-4">
                    <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->avatar }}" alt="">
                    <div class="space-y-1 font-medium">
                        <p>{{ Auth::user()->name }}</p>
                        <p class="text-sm text-gray-500">Desde {{ date('d-m-Y', strtotime(Auth::user()->created_at)) }}</p>
                    </div>
                </a>

                <a href="{{ url('/carrito/' . Auth::user()->id) }}">
                    <x-bi-cart-fill class="w-6 h-6" />
                </a>

                <form id="formLogout" action="{{ url('logout') }}" method="POST">
                    @csrf
                    
                    <button class="p-4 text-green-700 bg-white" type="submit" id="logout">{{ __('Logout!') }}</button>
                </form>
            </div>

        @else

            <div class="flex items-center justify-between p-2 text-lg duration-300 bg-white rounded-md cursor-pointer hover:bg-blue-500 hover:text-white">
                <a href="{{ url('login') }}" class="mr-4">{{ __('Iniciar Sesion') }}</a>
                <x-fas-user class="w-4 h-4" />
            </div>

        @endif

    </div>

    <main class="w-4/5 m-auto my-8 rounded-lg bg-azul-claro">
        @yield('content')
    </main>

    @extends('layouts.footer')

    <script src="js/app.js"></script>
    @yield('scripts')
</body>
</html>
