@extends('layouts.header')
@section('content')

<h2 class="flex justify-center py-8 text-2xl font-bold">Grind SkateShop, la tienda para skaters</h2>

<h3 class="p-8 text-2xl font-bold text-blue-500">Marcas en Nuestra Tienda</h3>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4">
    @foreach ($marcas as $marca)
    <div class="max-w-sm m-8 bg-white rounded-lg shadow-md hover:m-2">
        <a href="#">
            <img class="p-8 rounded-t-lg"
                src="{{ $marca->image }}"
                alt="product image" height="180px">

            <div class="w-full px-5 pb-5">
                <h2 class="text-xl font-semibold tracking-tight text-gray-900">
                    {{ $marca->nombre }}
                </h2>
        
                <div class="items-center my-4">
                    <p class="text-3xl font-bold text-gray-900">{{ $marca->descripcion }}</p>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>

@endsection