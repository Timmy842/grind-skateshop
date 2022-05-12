@extends('layouts.header')

@section('content')

<h1 class="p-8 text-2xl font-bold text-center text-azul-google">Editar Marca</h1>

<form method="POST" action="{{ url('/admin/marcas/' . $marca->id) }}" enctype="multipart/form-data">
    @csrf

    {{ method_field('PATCH') }}
    
    @include('marcas.form', ['submit' => 'Modificar Marca', 'cancel' => 'Cancelar la modificacion'])
</form>

@endsection