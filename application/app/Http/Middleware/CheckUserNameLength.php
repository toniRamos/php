<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserNameLength
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

        if (strlen($request->userName) < 10) {
            return response()->json("The user must have the same or more than 10 characters", 400);
        }

        if(!is_numeric($request->limit)){
            return response()->json("The limit is not a number, insert the limit in numeric format", 400);
        }


        return $next($request);
    }
}
