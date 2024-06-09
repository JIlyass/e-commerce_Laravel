<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
  
    
    public function handle(Request $request, Closure $next,): Response
    {
        
            if(!Auth::check()){
                return redirect()->route('auth.login');
            }
    
            if(Auth::user()->role == "admin"){
                return $next($request);
            }else{
                return to_route('auth.profile');

            }
            return abort(419);
        
    }
}
