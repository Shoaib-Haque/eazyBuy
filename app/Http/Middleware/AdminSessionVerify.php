<?php

namespace App\Http\Middleware;

use Closure;

class AdminSessionVerify
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
        if($request->session()->has('adminid')){
            return $next($request);
        }else{
            return redirect()->route('signin.index');
        }
    }
}
