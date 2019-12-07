<?php

namespace App\Http\Middleware;

use Closure;

class RoleAdmin
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
        if(\Auth::user()->role_id == 99){
            return $next($request);
        }
        return redirect('home')->with('warning' , 'จำกัดสิทธิ์การเข้าถึง');
    }
}
