@extends('layouts.header')

@section('content')

<h1 class="p-8 text-2xl font-bold text-center text-azul-google">Nuevo Producto</h1>

<form method="POST" action="{{ url('/admin/productos') }}" enctype="multipart/form-data">
    @csrf

    @include('productos.form', ['submit' => 'Añadir producto', 'cancel' => 'Cancelar la insercion'])
</form>

@endsection