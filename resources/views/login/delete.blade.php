@extends('layouts.header')

@section('content')

<h1 class="p-8 text-2xl font-bold text-center text-azul-google">Borrar Usuario</h1>

<p class="p-4 text-center">¿Dese borrar el cliente {{ $user->name }} de la tienda?</p>

<div class="flex justify-center">
    <div class="flex justify-around w-3/5 p-4">
        <form action="/admin/clientes/{{ $user->id }}" method="POST">
            @csrf
        
            {{ method_field('DELETE') }}
            
            <input type="submit" value="Borrar Usuario" class="p-2 mx-2 text-white bg-red-500 rounded-md cursor-pointer">
        </form>

        <a href="{{ url('/profile') }}">
            <input type="button" value="Cancelar Borrado" class="p-2 mx-2 text-white bg-green-500 rounded-md cursor-pointer">
        </a>
    </div>
</div>

@endsection