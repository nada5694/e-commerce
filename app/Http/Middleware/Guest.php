<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Guest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /*
            There are 2 methods to tell that if it's a "guest"
                1- if(Auth::guest()){...}
                2- if(!auth()->user()){...}
                
        */

        if(Auth::guest() || !auth()->user()){
            return ;
        }

        return $next($request);
    }
}
