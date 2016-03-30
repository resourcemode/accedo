<?php

namespace App\Http\Middleware;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Closure;
use Illuminate\Support\Facades\View;

class RouteName
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        View::share([
            'routeName' => $request->route()->getName()
        ]);

        return $next($request);
    }
}
