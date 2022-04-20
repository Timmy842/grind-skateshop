@extends('layouts.header')
@section('content')

<h2 class="flex justify-center py-8 text-2xl font-bold">Grind SkateShop, la tienda para skaters</h2>

<h3 class="p-8 text-2xl font-bold text-blue-500">Marcas en Nuestra Tienda</h3>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
    @foreach ($marcas as $marca)
    <div class="max-w-sm m-8 bg-white rounded-lg shadow-md">
        <a href="{{ url('/marca/' . $marca->id) }}">
            <div class="flex justify-center h-60">
                <img class="p-8 rounded-t-lg"
                src="{{ $marca->image }}"
                alt="product image" height="180px">
            </div>

            <div class="w-full px-5 pb-5">
                <h2 class="text-3xl font-bold tracking-tight text-center text-gray-900">
                    {{ $marca->nombre }}
                </h2>
            </div>
        </a>
    </div>
    @endforeach
</div>

<div class="flex justify-around p-8">
    <div class="w-3/4">
        {!! $marcas->links() !!}
    </div>
</div>

@endsection