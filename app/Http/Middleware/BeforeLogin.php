<?php

namespace App\Http\Middleware;

use Closure;

class BeforeLogin
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
        if(session()->has('adminid')){
            session()->flash('msg', 'You need to logout first');
            return redirect()->route('admin.index');
        }
        elseif(session()->has('Companyid')){
            session()->flash('msg', 'You need to logout first');
            //return redirect()->route('companyhome.index');
        }
        else{
            return $next($request);
        }
    }
}
