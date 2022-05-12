@extends('layouts.header')

@section('content')

<span id="secret_id" class="hidden"></span>

@if (Auth::user()->permissions === 'admin')

    <h1 id="admin" class="p-8 text-2xl font-bold text-center text-azul-principal">Admin Dashboard</h1>

    <div class="flex justify-around text-lg">
        <a class="font-semibold duration-300 cursor-pointer hover:text-white hover:underline" id="btnClientes">{{ __('Clientes') }}</a>
        <a class="font-semibold duration-300 cursor-pointer hover:text-white hover:underline" id="btnPedidos">{{ __('Pedidos') }}</a>
        <a class="font-semibold duration-300 cursor-pointer hover:text-white hover:underline" id="btnProductos">{{ __('Productos') }}</a>
        <a class="font-semibold duration-300 cursor-pointer hover:text-white hover:underline" id="btnMarcas">{{ __('Marcas') }}</a>
    </div>

    @if (Session::has('mensaje'))
        <div id="messageConfirmation" class="flex justify-center">
            <div class="flex justify-around w-3/5 py-6 mt-6 text-center text-white bg-green-500 rounded-2xl">
                <p class="">{{ Session::get('mensaje') }}</p>
    
                <button type="button" id="btnCloseMessage">
                    <x-css-close />
                </button>
            </div>
        </div>
    @endif

    @if (Session::has('mensajeError'))
        <div id="messageError" class="flex justify-center">
            <div class="flex justify-around w-3/5 py-6 mt-6 text-center text-white bg-red-500 rounded-2xl">
                <p class="">{{ Session::get('mensajeError') }}</p>

                <button type="button" id="btnCloseMessage">
                    <x-css-close />
                </button>
            </div>
        </div>
    @endif

    <div id="divProfile" class="relative m-6 overflow-x-auto sm:rounded-lg">
        <table id="tableRespone" class="w-full mb-6 text-sm text-left text-gray-500">
            <thead id="theadResponse">
                
            </thead>
            <tbody id="tbodyResponse">
    
            </tbody>
            <tfoot id="tfootResponse">
                
            </tfoot>
        </table>
    </div>

@else

    <h1 class="p-8 text-2xl font-bold text-center text-azul-principal">Mi Cuenta</h1>

    <div class="flex justify-around text-lg">
        <a class="font-semibold duration-300 cursor-pointer hover:text-white hover:underline" id="btnPerfilUser">{{ __('Mi perfil') }}</a>
        <a class="font-semibold duration-300 cursor-pointer hover:text-white hover:underline" id="btnPedidosUser">{{ __('Pedidos') }}</a>
    </div>

    <div id="infoPerfil" class="p-8">
        <h2 class="p-4 text-2xl font-bold text-center uppercase">Informacion Personal</h2>

        <div class="flex justify-around p-6 rounded-lg bg-azul-principal">
            <div class="text-white">
                <p class="my-2">Nombre: <span class="font-bold uppercase">{{ Auth::user()->name }}</span></p>
                <p class="my-2">Apellidos: 
                    <span class="font-bold uppercase">
                        @if ( Auth::user()->lastName === null )
                            {{ 'Apellidos no Registrados' }}
                        @else
                            {{ Auth::user()->lastName }}
                        @endif
                    </span>
                </p>
                <p class="my-2">Email: <span class="font-bold">{{ Auth::user()->email }}</span></p>
                <p class="my-2">Telefono: 
                    <span class="font-bold uppercase">
                        @if ( Auth::user()->telf === null )
                            {{ 'Telefono no Registrado' }}
                        @else
                            {{ Auth::user()->telf }}
                        @endif
                    </span>
                </p>
                <p class="my-2">Usuario desde: <span class="font-bold uppercase">{{ Auth::user()->created_at }}</span></p>
                <p class="my-2">Registro: 
                    <span class="font-bold uppercase">
                        @if ( Auth::user()->external_auth === null )
                            {{ 'Registro Interno' }}
                        @else
                            {{ Auth::user()->external_auth }}
                        @endif
                    </span>
                </p>
            </div>
            
            <div class="grid grid-cols-1">
                <img class="rounded-full w-36 h-36" src="{{ Auth::user()->avatar }}" alt="Avatar User">

                <a href="profile/user/{{ Auth::user()->id }}/edit" class="p-2 mt-2 leading-8 text-center text-white align-middle bg-green-500 rounded-lg hover:bg-green-600">Editar Perfil</a>
            </div>
        </div>
    </div>

    <div id="divProfile" class="relative m-6 overflow-x-auto sm:rounded-lg">
        <table id="tableResponeUser" class="w-full mb-6 text-sm text-left text-gray-500">
            <thead id="theadResponseUser">

            </thead>
            <tbody id="tbodyResponseUser">
    
            </tbody>
            <tfoot id="tfootResponseUser">
                
            </tfoot>
        </table>
    </div>

@endif

@endsection
