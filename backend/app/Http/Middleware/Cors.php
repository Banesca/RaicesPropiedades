<?php

namespace App\Http\Middleware;

use Closure;

class cors
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
        /*
        
        ESTO DA ERROR NO ACTIVAR 
        LOS ACCESOS ESTAN DEFINIDOS EN CONFIG/CORS.PHP
        
        header('Access-Control-Allow-Origin : *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers : Content-type, X-Auth-Token, Authozation, Origin');*/

        return $next($request);
    }
}
