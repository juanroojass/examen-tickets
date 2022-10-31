<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class permisoUsuarioTester
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
        if(intval(Auth::user()->id_tipo) === 2){
            return redirect('/herramientas/tickets'); 
        }
        return $next($request);
    }
}
