<div class="flex flex-col justify-center">

    <div class="flex flex-col m-4">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ isset($marca->nombre) ? $marca->nombre : old('nombre') }}" class="w-1/4">
    </div>

    <div class="flex flex-col m-4">
        <label for="descripcion">Descripcion</label>
        <input type="tex" name="descripcion" id="descripcion" value="{{ isset($marca->descripcion) ? $marca->descripcion : old('descripcion') }}" class="w-1/4">
    </div>

    <div class="flex flex-col m-4">
        <label for="image">Imagen</label>
            @if (isset($marca->image))
                <img src="{{ $marca->image }}" alt="Imagen Producto" height="150" width="150">
            @endif
        <input type="file" name="image" id="image" accept="image/*">
    </div>
    
    <div class="m-4">
        <input type="submit" value="{{ $submit }}" class="p-2 mx-2 text-white bg-green-500 rounded-md cursor-pointer">
    
        <a href="{{ url('/profile') }}">
            <input type="button" value="{{ $cancel }}" class="p-2 mx-2 text-white bg-red-500 rounded-md cursor-pointer">
        </a>
    </div>
</div>