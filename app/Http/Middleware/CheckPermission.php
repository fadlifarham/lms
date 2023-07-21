<?php

namespace App\Http\Middleware;

use Closure;
use Log;
use Auth;
use App\Ticket;

class CheckPermission
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
        $request_ticket = $request->id;
        if ($request->id == NULL) {
            $request_ticket = $request->id_ticket;
        }

        $ticket = Ticket::where('id', $request_ticket)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($ticket == NULL) {
            return redirect('not-found');
        }

        return $next($request);
    }
}
