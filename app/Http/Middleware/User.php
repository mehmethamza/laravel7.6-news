<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class User
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
        if (Auth::guard("user") -> check()) {
            if (Auth::guard("user") -> user() -> payment =="passive") {
               return redirect()->route("check");
            }
            else {

                return $next($request);
            }

        }else {

            return redirect() -> route("kullanici.login");
        }

    }
}
