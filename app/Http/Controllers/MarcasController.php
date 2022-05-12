<?php

namespace App\Http\Controllers;

use App\Models\Marcas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $marcas = DB::table('marcas')
                    ->select('*')
                    ->orderBy('nombre', 'ASC')
                    ->paginate(9);
        
        return view('marcas.index', compact('marcas'));
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
            return view('marcas/create');
        else
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

        $datos = $request->except('_token');

        if($request->hasFile('image'))
        {
            $datos['image'] = 'http://localhost/grind-skateshop/storage/app/public/' . $request->file('image')->store('uploads', 'public');
        }

        Marcas::insert($datos);

        return redirect('admin/marcas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marcas  $marcas
     * @return \Illuminate\Http\Response
     */
    public function show($id_marca)
    {
        //
        
        $marcas = DB::table('marcas')
                      ->select('*')
                      ->where('id', $id_marca)
                      ->get();

        $productos = DB::table('productos')
                         ->select('*')
                         ->where('marca_id', $id_marca)
                         ->get();
                         
        return view('marcas.marca', compact('marcas', 'productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marcas  $marcas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        if(Auth::user()->permissions === 'admin')
        {
            $marca = Marcas::findOrFail($id);
    
            return view('marcas/edit', compact('marca'));

        } else {

            return redirect('/profile');
            
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marcas  $marcas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $datos = $request->except(['_token', '_method']);

        if($request->hasFile('image'))
        {
            $image = Marcas::findOrFail($id);

            Storage::delete('public/uploads/' . $image->image);

            $datos['image'] = 'http://localhost/grind-skateshop/storage/app/public/' . $request->file('image')->store('uploads', 'public');
        }

        Marcas::where('id', $id)->update($datos);

        return redirect('/admin/marcas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marcas  $marcas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        $datos = Marcas::findOrFail($id);

        $productosMarca = DB::table('productos')
                          ->select('*')
                          ->where('marca_id', $id)
                          ->get();

        if ($productosMarca === null) {

            if($datos->image != '')
                Storage::delete($datos->image);
    
            Marcas::destroy($id);
    
            return redirect('/profile')->with('mensaje', 'Marca Borrado Correctamente.');
        } else {
            
            return redirect('/profile')->with('mensajeError', 'Marca Con Productos Actualmente.');
            
        }
        
    }

}
