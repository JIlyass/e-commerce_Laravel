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

// ---------------------------Profile

public function edit()
{
    return view('auth.profile', ['user' => Auth::user()]);
}

public function update(Request $request)
{
    $user =User::find(Auth::user()->id);

    $request->validate( [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    ]);

   

    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();

    return redirect()->route('auth.profile')->with('status', 'Profile updated successfully!');
}

public function updatePassword(Request $request)
{
    $user =User::find(Auth::user()->id);

    $request->validate( [
        'current_password' => 'required',
        'new_password' => 'required|string|min:8|confirmed',
    ]);

    
    if (!Hash::check($request->current_password, $user->password)) {
        return redirect()->route('profile.edit')
                         ->withErrors(['current_password' => 'Current password does not match.'])
                         ->withInput();
    }
    
    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->route('auth.profile')->with('status', 'Password updated successfully!');
}



}
