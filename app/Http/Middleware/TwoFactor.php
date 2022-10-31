<?php

namespace App\Http\Middleware;

use Closure;

class TwoFactor
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
        // if(!$request->hasValidCode()){
        //     return redirect()->route('two-factor.login');
        // }
        
        $user = auth()->user();
        if($user != null){ 
            if ($user->two_factor_secret == null) {
                return redirect()->route('auth.tf');
            }
        } 
        return $next($request);
    } 
}
