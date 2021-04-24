<?php

namespace App\Http\Middleware;

use Closure;

class CustomerSessionVerify
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
        if($request->session()->has('customerid')){
            return $next($request);
        }else{
            return redirect()->route('signin.index');
        }
    }
}
