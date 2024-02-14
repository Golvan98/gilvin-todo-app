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
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            $newUser = User::create($credentials);


            if (Auth::attempt($credentials))
            {
                $user = auth()->user();
                return redirect()->intended('home')->with('success', 'registered');
            }
            else
            {
                dd('sadge');
            }

    }

    public function logout()
    {

    }
}
