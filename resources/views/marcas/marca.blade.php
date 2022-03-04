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
            <h2 class="text-3xl font-bold tracking-tight text-center text-azul-principal">
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

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
    @foreach ($productos as $producto)
    <div class="max-w-sm m-8 bg-white rounded-lg shadow-md">
        <a href="{{ url('/productos.tabla.' . $producto->id) }}">
            <div class="flex justify-center h-60">
                <img class="p-8 rounded-t-lg"
                src="{{ $producto->image }}"
                alt="product image" height="180px">
            </div>

            <div class="w-full px-5 pb-5">
                <h2 class="h-20 text-3xl font-bold tracking-tight text-center text-gray-900">
                    {{ $producto->nombre }}
                </h2>

                <div class="items-center my-4">
                    <span class="text-3xl font-bold text-gray-700">{{ $producto->precio }}€</span>
                </div>
    
                <a href="#"
                    class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex justify-center">
                    Añadir al carrito
                </a>
            </div>
        </a>
    </div>
    @endforeach
</div>

@if ($productos == '[]')
    <h2 class="flex justify-center p-8 text-5xl font-bold text-azul-principal">No hay productos de esta marca en stock</h2>

    <div class="flex justify-center p-8">
        <a href="{{ url('marcas.index') }}" class="p-4 m-4 text-xl font-bold rounded-md bg-fondo">Volver a las Marcas</a>
    </div>
@endif

@endsection