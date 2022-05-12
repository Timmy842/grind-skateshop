<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\ProductosController;
use App\Models\Marcas;
use App\Models\Productos;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Routes Index

Route::get('/', [ProductosController::class, 'index']);

// Routes Productos

Route::get('tablas', [ProductosController::class, 'verTablas']);
Route::get('productos/tabla/{id_producto}', [ProductosController::class, 'verTabla']);

Route::get('ejes', [ProductosController::class, 'verEjes']);
Route::get('productos/eje/{id_producto}', [ProductosController::class, 'verEje']);

Route::get('ruedas', [ProductosController::class, 'verRuedas']);
Route::get('productos/rueda/{id_producto}', [ProductosController::class, 'verRueda']);

Route::get('productos/{id_producto}/{tipo_id}', [ProductosController::class, 'verProductos']); // Desde cada marca poder ir a un producto

Route::resource('admin/productos', ProductosController::class);

// Routes Marcas

Route::get('marca/{id_marca}', [MarcasController::class, 'show']);

Route::resource('marcas', MarcasController::class);

// Routes Usuarios

Route::get('login', function() {
    return view('/login/login');
})->name('login')->middleware('guest');

Route::get('register', function() {
    return view('/login/register');
})->name('register')->middleware('guest');

Route::post('/login', [LoginController::class, 'login']);

Route::post('/register', [LoginController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth', function () {
    $user = Socialite::driver('google')->user();

    $userExists = User::where('external_id', $user->id)->where('external_auth', 'google')->first();

    if($userExists)
    {

        Auth::login($userExists);

    } else {

        $userNew = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'external_id' => $user->id,
            'external_auth' => 'google',
        ]);
        
        Auth::login($userNew);

    }
    
    return redirect('/');
    
    // $user->token
});

// Routes para la cuenta de los usuarios

Route::get('/profile', [LoginController::class, 'profile'])->name('profile')->middleware('auth');

Route::get('profile/user/{id}/edit', [LoginController::class, 'edit'])->middleware('auth');
Route::patch('profile/user/{id}', [LoginController::class, 'update'])->middleware('auth');

    /* Admin Routes Clientes */
Route::delete('admin/clientes/{id}', [LoginController::class, 'destroy'])->middleware('auth');
Route::get('/admin/delete/clientes/{id}', [AdminController::class, 'deleteUser'])->middleware('auth');
Route::get('/admin/clientes', [AdminController::class, 'getClientes'])->name('admin/clientes')->middleware('auth'); // JSON Clientes

    /* Admin Routes Pedidos */
Route::get('/admin/pedidos', [AdminController::class, 'getPedidos'])->name('admin/pedidos')->middleware('auth'); // JSON Pedidos

    /* Admin Routes Productos */
Route::get('/admin/delete/productos/{id}', [AdminController::class, 'deleteProducto'])->middleware('auth');
Route::resource('/admin/productos', ProductosController::class)->middleware('auth');
Route::get('/admin/productos', [AdminController::class, 'productoOK'])->middleware('auth');
Route::get('/get/admin/productos', [AdminController::class, 'getProductos'])->middleware('auth'); // JSON Productos

    /* Admin Routes Marcas */
Route::get('/admin/delete/marcas/{id}', [AdminController::class, 'deleteMarca'])->middleware('auth');
Route::resource('/admin/marcas', MarcasController::class)->middleware('auth');
Route::get('/admin/marcas', [AdminController::class, 'marcaOK'])->middleware('auth');
Route::get('/get/admin/marcas', [AdminController::class, 'getMarcas'])->middleware('auth'); // JSON Marcas
