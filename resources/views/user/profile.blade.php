@extends('layouts.header')

@section('content')

<span id="secret_id" class="hidden"></span>

@if (Auth::user()->permissions === 'admin')

    <h1 id="admin" class="p-4 text-2xl font-bold text-center text-azul-principal">Admin Dashboard</h1>

    <div class="flex justify-around text-lg">
        <a class="font-semibold duration-300 hover:text-white hover:underline" href="{{ url('admin/clientes') }}">{{ __('Clientes') }}</a>
        <a class="font-semibold duration-300 hover:text-white hover:underline" href="{{ url('admin/pedidos') }}">{{ __('Pedidos') }}</a>
        <a class="font-semibold duration-300 hover:text-white hover:underline" href="{{ url('admin/productos') }}">{{ __('Productos') }}</a>
        <a class="font-semibold duration-300 hover:text-white hover:underline" href="{{ url('admin/marcas') }}">{{ __('Marcas') }}</a>
    </div>
    
@else

    <h1 class="p-4 text-2xl font-bold text-center text-azul-principal">Mi Cuenta</h1>

@endif

<script src="resources/js/profileFetchPetition.js"></script>

@endsection
