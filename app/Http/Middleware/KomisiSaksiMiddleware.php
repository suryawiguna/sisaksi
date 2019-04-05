<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class KomisiSaksiMiddleware
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
      if(Auth::user()->role_id == 2) {
        return $next($request);
      }
      return redirect('/target');
    }
}
