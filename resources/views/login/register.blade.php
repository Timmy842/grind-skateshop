@extends('layouts.header')

@section('content')
<h1 class="py-8 text-2xl font-bold text-center text-blue-500">Crea una cuenta nueva</h1>

<form action="{{ url('/register') }}" method="POST" class="flex justify-center">
    @csrf

    <div class="flex flex-col w-1/4">
        <div class="flex flex-col m-4">
            <label for="nombre" class="mb-4 text-xl font-semibold text-center">Nombre</label>
            <input type="email" name="nombre" id="nombre" class="p-2 border border-solid rounded border-azul-principal">
        </div>

        <div class="flex flex-col m-4">
            <label for="apellidos" class="mb-4 text-xl font-semibold text-center">Apellidos</label>
            <input type="email" name="apellidos" id="apellidos" class="p-2 border border-solid rounded border-azul-principal">
        </div>
        
        <div class="flex flex-col m-4">
            <label for="correo" class="mb-4 text-xl font-semibold text-center">Email</label>
            <input type="email" name="correo" id="correo" class="p-2 border border-solid rounded border-azul-principal">
        </div>

        <div class="flex flex-col m-4">
            <label for="password" class="mb-4 text-xl font-semibold text-center">Contraseña</label>
            <input type="text" name="password" id="password" class="p-2 border border-solid rounded border-azul-principal">
        </div>

        <div class="flex justify-center">
            <input type="submit" value="Inicar Sesion" class="p-2 px-6 m-4 text-white bg-blue-600 rounded-lg cursor-pointer">
        </div>
    </div>

</form>
@endsection