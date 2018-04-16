<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckRole
{
    public function handle($request, Closure $next,$role)
    {
        if( Auth::check() and Auth::user()->role==$role){
             return $next($request);
        }
       return redirect('/');
    }
}
