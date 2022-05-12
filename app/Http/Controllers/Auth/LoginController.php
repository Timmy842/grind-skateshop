<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->except('_token');

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            
            return redirect('/');
        }
    
        return redirect('login');
    }

    public function register(Request $request)
    {
        $request['password'] = Hash::make($request['password']);
        
        $credentials = $request->except('_token');

        User::insert($credentials);
    
        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return redirect('/');
    }

    public function profile()
    {
        return view('user/profile');
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        //

        $user = User::findOrFail($user_id);

        return view('user/edit', compact('user'));
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

        $request['password'] = Hash::make($request['password']);
        
        $datos = $request->except(['_token', '_method']);

        User::where('id', $id)->update($datos);

        return redirect('profile');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/profile')->with('mensaje', 'Cliente Borrado Correctamente');
    } 
    
}
