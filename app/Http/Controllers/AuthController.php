<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()  {
        return view('Auth.register');
    }
    public function to_register(Request $req)  {
        $req->validate(
            [
                'name' => 'required|alpha|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]
        );
        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            // Add other fields as needed
        ]);
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
    }

public function logout() {
    Auth::logout();
}
}
