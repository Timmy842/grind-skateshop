@extends('layouts.header')
@section('content')

<h2 class="flex justify-center py-8 text-2xl font-bold">Grind SkateShop, la tienda para skaters</h2>

<h3 class="p-8 text-2xl font-bold text-blue-500">Tablas de Skate</h3>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
    @foreach ($productos as $producto)
    <div class="max-w-sm m-8 bg-white rounded-lg shadow-md hover:m-2">
        <a href="{{ url('/marcas.marca.' . $producto->id) }}">
            <div class="flex justify-center h-60">
                <img class="p-8 rounded-t-lg"
                src="{{ $producto->image }}"
                alt="product image" height="180px">
            </div>

            <div class="w-full px-5 pb-5">
                <h2 class="text-3xl font-bold tracking-tight text-center text-gray-900">
                    {{ $producto->nombre }}
                </h2>
            </div>
        </a>
    </div>
    @endforeach
</div>

@endsection