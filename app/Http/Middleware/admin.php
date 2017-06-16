<?php

namespace produccion\Http\Middleware;

use Closure;

class admin
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
        
        if(\Auth::check())
        {
            if(\Auth::user()->Id_Rol == 1)
            {
              return $next($request);
            }
           
            else
            {
              return redirect('indexa');
            }
        }

        else
        {
            return redirect('login');
        }

        
    }
}
