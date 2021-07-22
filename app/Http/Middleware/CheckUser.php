<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->isSAdmin()){
                return redirect(route('home'));
            }
            else if(Auth::user()->isAdmin()){
                return redirect(route('home'));
            }
            else if(Auth::user()->isEmployee()){
                return $next($request);
            }
        }
    }
}
