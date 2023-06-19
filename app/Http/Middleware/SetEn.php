<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App;
class SetEn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        App::setLocale('en');

        return $next($request);
    }
}
