<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Marcas;
use App\Models\Productos;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    
    /* 
     *  Sacar clientes a json 
     */

    public function getClientes()
    {
        $clientes = DB::table('users')
                    ->select('*')
                    ->where('permissions', 'user')
                    ->get();

        $json_clientes = json_encode($clientes);
                    
        echo $json_clientes;
    }

    public function deleteUser($id)
    {
        if(Auth::user()->permissions === 'admin')
        {
            $user = User::findOrFail($id);
            
            return view('login/delete', compact('user'));
        } else
            return redirect('/profile');
    }

    /* 
     *  Sacar pedidos a json 
     */
    
    public function getPedidos()
    {
        $pedidos = DB::table('pedidos')
                    ->select('*')
                    ->get();

        $json_pedidos = json_encode($pedidos);
                    
        echo $json_pedidos;
    }

    /* 
     *  Sacar productos a json 
     */

    public function getProductos()
    {
        $productos = DB::table('productos')
                    ->select('*')
                    ->orderBy('tipo_id')
                    ->get();

        $json_productos = json_encode($productos);
                    
        echo $json_productos;
    }

    public function productoOK()
    {        
        return redirect('/profile')->with('mensaje', 'Accion Realizada Correctamente.');
    }

    public function deleteProducto($id)
    {
        if(Auth::user()->permissions === 'admin')
        {
            $producto = Productos::findOrFail($id);
            
            return view('productos/delete', compact('producto'));
        } else
            return redirect('/profile');
    }

    /* 
     *  Sacar marcas a json 
     */

    public function getMarcas()
    {
        $marcas = DB::table('marcas')
                    ->select('*')
                    ->get();

        $json_marcas = json_encode($marcas);
                    
        echo $json_marcas;
    }

    public function marcaOK()
    {        
        return redirect('/profile')->with('mensaje', 'Accion Realizada Correctamente.');
    }

    public function deleteMarca($id)
    {
        if(Auth::user()->permissions === 'admin')
        {
            $marca = Marcas::findOrFail($id);
            
            return view('marcas/delete', compact('marca'));
        } else
            return redirect('/profile');
    }

}
