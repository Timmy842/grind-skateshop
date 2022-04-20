<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\ProductosController;
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