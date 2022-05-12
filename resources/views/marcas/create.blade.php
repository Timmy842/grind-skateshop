@extends('layouts.header')

@section('content')

<h1 class="p-8 text-2xl font-bold text-center text-azul-google">Nueva Marca</h1>

<form method="POST" action="{{ url('/admin/marcas') }}" enctype="multipart/form-data">
    @csrf

    @include('marcas.form', ['submit' => 'Añadir marca', 'cancel' => 'Cancelar la insercion'])
</form>

@endsection