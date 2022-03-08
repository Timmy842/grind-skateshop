@extends('layouts.header')

@section('content')
<h1 class="py-8 text-2xl font-bold text-center text-blue-500">Iniciar Sesion</h1>

<form action="{{ url('/login') }}" method="POST" class="flex justify-center">
    @csrf

    <div class="flex flex-col w-1/4">
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

        <div class="flex justify-center">
            <a href="{{ url('/register') }}" class="m-4 duration-200 hover:underline">¿No Tienes Cuenta? Registrate Ahora</a>
        </div>
    </div>

</form>
@endsection