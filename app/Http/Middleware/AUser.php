<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AUser
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
            if((auth()->user()->is_superadmin === 0) && (auth()->user()->role == 'admin')){
                return $next($request);
                // return redirect(route('admin'));
            }
        }
        abort(403);
        // return $next($request);
    }
}
