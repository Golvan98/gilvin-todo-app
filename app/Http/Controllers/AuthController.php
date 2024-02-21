<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Professional;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use illuminate\Contracts\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\Guard as AuthGuard;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\Guard;
class AuthController extends Controller
{
    
    public function register(Request $request)
    {
           $credentials =  $request->validate([
                'name' => 'required|min:4|max:50',
                'email' => 'required|email|min:2|max:40',
                'password' => 'required|min:8|max:25',
            ]);

            $newUser = User::create($credentials);


            if (Auth::attempt($credentials))
            {
                
                return redirect()->intended('home')->with('success', 'registered');
            }
            else
            {
              // nothing to be done here, const register form error on vuejs already prevents a misinput attempt on register, dd below exists just in case
              dd('misinput bypassed form errors');
            }

    }

    public function login(Request $request)
    {      

        if (!Auth::attempt($request->validate([
            'email' => 'required|string|email',
            'password' => 'required|'
        ]), true)) {
            throw ValidationException::withMessages([
                'email' => 'invalid username or password',
                
            ]);
        }

        $request->session()->regenerate();
        return redirect()->intended('home')->with('success', 'User Logged In');


    }

    public function logout(Request $request)
    {

            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->intended('home')->with('success', 'user logged out');
    }
}
