<?php

namespace App\Http\Middleware;

use Closure;

class RoleDoc
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
        if(\Auth::user()->role_id == 10){
            return $next($request);
        }
        return redirect('home')->with('warning' , 'จำกัดสิทธิ์การเข้าถึง');

    }
}
