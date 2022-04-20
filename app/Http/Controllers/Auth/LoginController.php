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
    
}
