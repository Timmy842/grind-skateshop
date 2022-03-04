@extends('layouts.header')
@section('content')

<h2 class="flex justify-center py-8 text-2xl font-bold">Grind SkateShop, la tienda para skaters</h2>

<div class="flex justify-center">
    @foreach ($productos as $producto)
    <div class="w-3/4 p-8 m-8 bg-white rounded-lg shadow-md">
        <div class="grid grid-cols-3 gap-12">
            <div class="flex justify-center h-60">
                <img class="p-8 rounded-t-lg" src="{{ $producto->image }}" alt="product image" height="180px">
            </div>

            <div class="col-start-2 col-end-4">
                <h2 class="mb-8 text-5xl font-bold tracking-tight text-center text-gray-900">
                    {{ $producto->nombre }}
                </h2>

                <div class="items-center my-4">
                    <span class="text-3xl font-bold text-gray-700">{{ $producto->precio }}€</span>
                </div>

                <div class="grid items-center grid-cols-3 gap-4">
                    <div class="col-start-1">
                        <div class="relative flex flex-row w-full h-10 mt-1 bg-transparent rounded-lg">
                            <button data-action="decrement" class="w-20 h-full text-gray-600 bg-gray-300 rounded-l outline-none cursor-pointer hover:text-gray-700 hover:bg-gray-400">
                                <span class="m-auto text-2xl font-thin">−</span>
                            </button>

                            <input type="number" class="flex items-center w-full font-semibold text-center text-gray-700 bg-gray-300 outline-none focus:outline-none text-md hover:text-black focus:text-black md:text-basecursor-default"
                                name="custom-input-number" value="0"></input>

                            <button data-action="increment" class="w-20 h-full text-gray-600 bg-gray-300 rounded-r cursor-pointer hover:text-gray-700 hover:bg-gray-400">
                                <span class="m-auto text-2xl font-thin">+</span>
                            </button>
                        </div>
                    </div>

                    <a href="#" class="col-start-2 col-end-4 p-4 text-lg font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                        Añadir al carrito
                    </a>
                </div>

                <div class="flex items-center justify-around">
                    <h2 class="text-2xl font-bold text-azul-principal">Marca:</h2>
                    
                    <img src="{{ $marcas[0]->image }}" alt="{{ $marcas[0]->nombre }}">
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection

@section('scripts')
    <script type="text/javascript" src="http://localhost/grind-skateshop/resources/js/cantidadProducto.js"></script>
@endsection