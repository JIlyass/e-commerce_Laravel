<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function profile()  {
        return view('Auth.profile');
    }
    public function register()  {
        return view('Auth.register');
    }
    public function to_register(Request $req)  {
        $log=$req->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'password_confirmation' => 'required|string|min:8|same:password',
            ]
        );
        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            // Add other fields as needed
        ]);
        if(Auth::attempt($log)){
            session()->regenerate();
            return to_route("dashboard.index");
        }else{
            return to_route('auth.login')
            ->withErrors("email","Email ou password incorrecte !! ")
            ->withInput(['email'])
            ;
        }
        return to_route('dashboard.index');

    }

public function login(){
    return view("Auth.login");
}
public function to_login(Request $req){
        $loginData = $req->validate([
            "email"=>"required|email",
            "password"=>"required"
        ]);
        if(Auth::attempt($loginData)){
            session()->regenerate();
            return to_route("dashboard.index");
        }else{
            return to_route('auth.login')
            ->withErrors("email","Email ou password incorrecte !! ")
            ->withInput(['email'])
            ;
        }
        return to_route('dashboard.index');
    }

public function logout() {
    Auth::logout();
    return to_route('home.index');
}
}
