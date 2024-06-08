<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
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
}
