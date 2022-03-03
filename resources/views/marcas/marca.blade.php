@extends('layouts.header')
@section('content')

<h2 class="flex justify-center py-8 text-2xl font-bold">Grind SkateShop, la tienda para skaters</h2>

<div class="flex justify-center">
    @foreach ($marcas as $marca)
    <div class="w-3/4 m-8 bg-white rounded-lg shadow-md">
        <div class="flex justify-center h-60">
            <img class="p-8 rounded-t-lg" src="{{ $marca->image }}" alt="product image" height="180px">
        </div>

        <div class="w-full px-5 pb-5">
            <h2 class="text-3xl font-bold tracking-tight text-center text-gray-900">
                {{ $marca->nombre }}
            </h2>

            <p class="text-xl font-semibold text-left text-gray-700">
                {{ $marca->descripcion }}
            </p>
        </div>
    </div>
    @endforeach
</div>

<h2 class="flex justify-center py-8 text-2xl font-bold">Productos de la Marca</h2>

@endsection