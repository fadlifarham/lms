<?php

namespace App\Http\Middleware;
use App\User;
use Closure;

class CheckAdmin
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

        if ($status_id == 3) {
            return $next($request);
        } else {
            abort(404);
        }
    }
}
