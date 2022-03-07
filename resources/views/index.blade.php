@extends('layouts.header')
@section('content')

<h2 class="flex justify-center py-8 text-2xl font-bold">Grind SkateShop, la tienda para skaters</h2>

<h3 class="p-8 text-2xl font-bold text-blue-500">Productos Destacados</h3>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4">
    @for ($i = 0; $i < 4; $i++)
    <div class="max-w-sm m-8 bg-white rounded-lg shadow-md hover:m-2">
        <a href="#">
            <img class="p-8 rounded-t-lg"
                src="{{ $productos[$i]->image }}"
                alt="product image" height="180px">
        </a>

        <div class="w-full px-5 pb-5">
            <a href="#" class="text-xl font-semibold tracking-tight text-gray-900">
                {{ $productos[$i]->nombre }}
            </a>

            <div class="items-center my-4">
                <span class="text-3xl font-bold text-gray-900">{{ $productos[$i]->precio }}</span>
            </div>

            <a href="#"
                class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex justify-center">
                Añadir al carrito
            </a>
        </div>
    </div>
    @endfor
</div>

<h3 class="p-8 text-2xl font-bold text-blue-500">Productos de la Marca Destacada</h3>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4">
    @for ($i = 0; $i < 4; $i++)
    <div class="max-w-sm m-8 bg-white rounded-lg shadow-md hover:m-2">
        <a href="#">
            <img class="p-8 rounded-t-lg"
                src="https://picnicskateshop.net/wp-content/uploads/2021/10/ace-trucka-af1-33-skate-ejes-02.jpg"
                alt="product image" height="180px">
        </a>

        <div class="w-full px-5 pb-5">
            <a href="#" class="text-xl font-semibold tracking-tight text-gray-900">
                Eje ACE
            </a>

            <div class="items-center my-4">
                <span class="text-3xl font-bold text-gray-900">$79</span>
            </div>

            <a href="#"
                class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex justify-center">
                Añadir al carrito
            </a>
        </div>
    </div>
    @endfor
</div>

@endsection