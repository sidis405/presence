<?php

namespace App\Http\Middleware;

use Closure;

class DoorMustBeSelected
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
        if (!session('door_id')) {
            return redirect('doors');
        }
        return $next($request);
    }
}
