<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EUser
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
            if((auth()->user()->is_superadmin === 0) && (auth()->user()->role == 'employee')){
                return $next($request);
                // return redirect(route('dashboard'));
            }
        }
        abort(403);
        // return $next($request);
    }
}
