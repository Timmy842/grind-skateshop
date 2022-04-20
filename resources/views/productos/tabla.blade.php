@extends('layouts.header')
@section('content')

<h2 class="py-8 text-2xl font-bold text-center">Grind SkateShop, la tienda para skaters</h2>

<div class="flex justify-center">
    @foreach ($productos as $producto)
    <div class="w-3/4 p-8 m-8 bg-white rounded-lg shadow-md">
        <div class="grid grid-cols-1 gap-12 md:grid-cols-3">
            <div class="md:flex md:justify-center h-60">
                <img class="p-8 rounded-t-lg" src="{{ $producto->image }}" alt="product image" height="180px">
            </div>

            <div class="md:col-start-2 md:col-end-4">
                <h2 class="mb-8 text-5xl font-bold tracking-tight text-center text-gray-900">
                    {{ $producto->nombre }}
                </h2>

                <div class="items-start font-medium">
                    <p class="text-xl">Medida: {{ $producto->medida }}</p>
                </div>

                <div class="items-center my-4">
                    <span class="text-3xl font-bold text-azul-principal">{{ $producto->precio }}€</span>
                </div>

                <div class="items-center my-4 md:grid md:grid-cols-3 md:gap-4">
                    <div class="md:col-start-1">
                        <div class="relative flex flex-row h-10 mt-1 bg-transparent rounded-lg w md:w-full">
                            <button data-action="decrement" id="decrement" class="w-20 h-full text-gray-600 bg-gray-300 rounded-l outline-none cursor-pointer hover:text-gray-700 hover:bg-gray-400">
                                <span class="m-auto text-2xl font-thin">−</span>
                            </button>

                            <input id="cantidad" class="flex items-center w-full font-semibold text-center text-gray-700 bg-gray-300 outline-none focus:outline-none text-md hover:text-black focus:text-black md:text-basecursor-default"
                                name="custom-input-number" value="0" readonly></input>

                            <button data-action="increment" id="increment" class="w-20 h-full text-gray-600 bg-gray-300 rounded-r cursor-pointer hover:text-gray-700 hover:bg-gray-400">
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

                    <a href="{{ url('/marca/' . $marcas[0]->id) }}">
                        <img src="{{ $marcas[0]->image }}" alt="{{ $marcas[0]->nombre }}">
                    </a>
                </div>
            </div>
        </div>

        <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />

        <div class="p-4 rounded-lg bg-fondo">
            <h2 class="mb-4">Descripcion del Producto:</h2>
            
            <p class="text-azul-principal">{{ $producto->descripcion }}</p>
        </div>

    </div>
    @endforeach
</div>

@endsection

@section('scripts')
    <script type="text/javascript" src="http://localhost/grind-skateshop/resources/js/cantidadProducto.js"></script>
@endsection