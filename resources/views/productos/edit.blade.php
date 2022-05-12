@extends('layouts.header')

@section('content')

<h1 class="p-8 text-2xl font-bold text-center text-azul-google">Editar Producto</h1>

<form method="POST" action="{{ url('/admin/productos/' . $producto->id) }}" enctype="multipart/form-data">
    @csrf

    {{ method_field('PATCH') }}
    
    @include('productos.form', ['submit' => 'Modificar Producto', 'cancel' => 'Cancelar la modificacion'])
</form>

@endsection