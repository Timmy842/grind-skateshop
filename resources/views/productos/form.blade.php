<div class="flex flex-col justify-center">

    <div class="flex flex-col m-4">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ isset($producto->nombre) ? $producto->nombre : old('nombre') }}" class="w-1/4">
    </div>

    <div class="flex flex-col m-4">
        <label for="descripcion">Descripcion</label>
        <input type="text" name="descripcion" id="descripcion" value="{{ isset($producto->descripcion) ? $producto->descripcion : old('descripcion') }}" class="w-1/4">
    </div>

    <div class="flex flex-col m-4">
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio" value="{{ isset($producto->precio) ? $producto->precio : old('precio') }}" class="w-1/4">
    </div>
    
    <div class="flex flex-col m-4">
        <label for="medida">Medida</label>
        <input type="text" name="medida" id="medida" value="{{ isset($producto->medida) ? $producto->medida : old('medida') }}" class="w-1/4">
    </div>

    <div class="flex flex-col m-4">
        <label for="tipo_id">Tipo de Producto</label>
        <select name="tipo_id" id="tipo_id" class="w-1/4">
            <option disabled
            @if (!isset($marca_id))
                selected
            @endif
            >
                -- Selecciona Tipo Producto --
            </option>
            <option value="1">Tabla</option>
            <option value="2">Ejes</option>
            <option value="3">Ruedas</option>
        </select>
    </div>

    <div class="flex flex-col m-4">
        <label for="marca">Marca</label>
        <select name="marca_id" id="marca_id" class="w-1/4">
            <option selected disabled>-- Selecciona Marca Producto --</option>
            @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}"
                    @if (isset($marca_id))
                        {{ ($marca->id == $marca_id->id) ? 'selected' : '' }}
                    @endif
                    >
                    {{ $marca->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="flex flex-col m-4">
        <label for="image">Imagen</label>
            @if (isset($producto->image))
                <img src="{{ $producto->image }}" alt="Imagen Producto" height="150" width="150">
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