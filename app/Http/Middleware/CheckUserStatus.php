<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserStatus
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
        $status_id = \Auth::user()->status_id;

        if ($status_id == 1) {
            return $next($request);
        } else {
            abort(404);
        }
        
        // return $next($request);
    }
}
