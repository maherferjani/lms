<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class EstAdmin
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
        if(Auth::user() && Auth::user()->role == 1)
            return $next($request);

        return abort(401);
        
    }
}
