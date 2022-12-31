<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Dashboard
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
        if (Auth()->guest() && Auth::guest() && !Auth::user())
        {
            return redirect('/register');
        }

        if (auth()->user()->user_type != "admin" &&
            auth()->user()->user_type != "moderator" &&
            auth()->user()->user_type != "vendor")
        {
            return redirect('/');
        }
        return $next($request);
    }
}
