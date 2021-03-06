<?php

namespace App\Http\Controllers;

use App\Models\Marcas;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $productos = DB::table('productos')
                        ->select('*')
                        ->orderBy('precio', 'DESC')
                        ->get();

        return view('index', compact('productos'));
    }

    /* Funcion para controlar los productos desde marcas */

    public function verProductos($id_producto, $tipo_id)
    {
        $productos = DB::table('productos')
            ->select('*')
            ->where('id', $id_producto)
            ->get();

        $marcas = DB::table('marcas')
            ->select('*')
            ->where('id', $productos[0]->marca_id)
            ->get();

        switch ($productos)
        {
            case $tipo_id == 1:
                return view('productos.tabla', compact('productos', 'marcas'));

                break;
            case $tipo_id == 2:
                return view('productos.eje', compact('productos', 'marcas'));

                break;
            case $tipo_id == 3:
                return view('productos.rueda', compact('productos', 'marcas'));

                break;
            default:
                return view('index');

                break;
        }
    }

    /* Funciones Controlador de Tablas */

    public function verTablas()
    {
        $productos = DB::table('productos')
            ->select('*')
            ->where('tipo_id', '1')
            ->get();

        return view('productos.tablas', compact('productos'));
    }

    public function verTabla($id_producto)
    {
        $productos = DB::table('productos')
            ->select('*')
            ->where('id', $id_producto)
            ->get();

        $marcas = DB::table('marcas')
            ->select('*')
            ->where('id', $productos[0]->marca_id)
            ->get();

        if ($productos[0]->tipo_id == 1)
            return view('productos.tabla', compact('productos', 'marcas'));
        else
            return view('index');
    }

    /* Funciones Controlador de Ejes */

    public function verEjes()
    {
        $productos = DB::table('productos')
            ->select('*')
            ->where('tipo_id', '2')
            ->get();

        return view('productos.ejes', compact('productos'));
    }

    public function verEje($id_producto)
    {
        $productos = DB::table('productos')
            ->select('*')
            ->where('id', $id_producto)
            ->get();

        $marcas = DB::table('marcas')
            ->select('*')
            ->where('id', $productos[0]->marca_id)
            ->get();

        if ($productos[0]->tipo_id == 2)
            return view('productos.eje', compact('productos', 'marcas'));
        else
            return view('index');
    }

    /* Funciones Controlador de Ruedas */

    public function verRuedas()
    {
        $productos = DB::table('productos')
            ->select('*')
            ->where('tipo_id', '3')
            ->get();

        return view('productos.ruedas', compact('productos'));
    }

    public function verRueda($id_producto)
    {
        $productos = DB::table('productos')
        ->select('*')
            ->where('id', $id_producto)
            ->get();

        $marcas = DB::table('marcas')
            ->select('*')
            ->where('id', $productos[0]->marca_id)
            ->get();

        if ($productos[0]->tipo_id == 3)
            return view('productos.rueda', compact('productos', 'marcas'));
        else
            return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        if(Auth::user()->permissions === 'admin')
        {
            $marcas = Marcas::all();
        
            return view('productos/create', compact('marcas'));
        } else
            return redirect('/profile');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $tipoProducto = '';
        $tipoId = $request->only('tipo_id');

        switch($tipoId)
        {
            case $tipoId['tipo_id'] === '1':
                $tipoProducto = 'Tabla';

                break;
            case $tipoId['tipo_id'] === '2':
                $tipoProducto = 'Eje';

                break;
            case $tipoId['tipo_id'] === '3':
                $tipoProducto = 'Ruedas';

                break;
            default:
                break;
        }
        
        $datos = $request->except('_token');

        $datos['tipo'] = $tipoProducto;
        
        if($request->hasFile('image'))
        {
            $datos['image'] = 'http://localhost/grind-skateshop/storage/app/public/' . $request->file('image')->store('uploads', 'public');
        }

        Productos::insert($datos);

        return redirect('admin/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($producto_id)
    {
        //

        if(Auth::user()->permissions === 'admin')
        {
            $producto = Productos::findOrFail($producto_id);

            $marcas = Marcas::all();
    
            $marca_id = Marcas::findOrFail($producto->marca_id);        
    
            return view('productos/edit', compact('marca_id', 'producto', 'marcas'));
            
        } else
            return redirect('/profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $tipoProducto = '';
        $tipoId = $request->only('tipo_id');

        switch($tipoId)
        {
            case $tipoId['tipo_id'] === '1':
                $tipoProducto = 'Tabla';

                break;
            case $tipoId['tipo_id'] === '2':
                $tipoProducto = 'Eje';

                break;
            case $tipoId['tipo_id'] === '3':
                $tipoProducto = 'Ruedas';

                break;
            default:
                break;
        }
        
        $datos = $request->except(['_token', '_method']);

        $datos['tipo'] = $tipoProducto;

        if($request->hasFile('image'))
        {
            $image = Productos::findOrFail($id);

            Storage::delete('public/uploads/' . $image->image);

            $datos['image'] = 'http://localhost/grind-skateshop/storage/app/public/' . $request->file('image')->store('uploads', 'public');
        }

        Productos::where('id', $id)->update($datos);

        return redirect('/admin/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $datos = Productos::findOrFail($id);

        if($datos->image != '')
            Storage::delete($datos->image);

        Productos::destroy($id);

        return redirect('/profile')->with('mensaje', 'Producto Borrado Correctamente.');
    }
}
