<?php

namespace App\Http\Middleware;


use Closure;

use Illuminate\Support\Facades\Auth;
class CustomCKFinderAuth
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
        /* ------------ cách bảo mật kém-------------- */
        config(['ckfinder.authentication' => function() {
            return true;
        }]);
        return $next($request);



        /*-----------------bao mật tốt------------- */
        /*if (Auth::check()) {
            config(['ckfinder.authentication' => function() use ($request) {
                return true;
            }] );
        } else {
            config(['ckfinder.authentication' => function() use ($request) {
                return false;
            }] );
        }
        return $next($request);
        */


    }
}
