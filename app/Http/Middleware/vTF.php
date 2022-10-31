<?php

namespace App\Http\Middleware;

use Closure;

class vTF
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
        return redirect()->route('two-factor.login');
        
        return $next($request);
    }
}
