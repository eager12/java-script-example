<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App;
class SetFa
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
        App::setLocale('fa');
        return $next($request);
    }
}
