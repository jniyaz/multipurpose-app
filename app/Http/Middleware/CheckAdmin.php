<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!in_array(1, $request->user()->roles->pluck('id')->toArray()) || !in_array(2, $request->user()->roles->pluck('id')->toArray())) {
            abort(404);
        }

        return $next($request);
    }
}
