<?php

namespace App\Http\Middleware;
use Closure;

class IsAjaxMiddleware
{

    public function handle($request, Closure $next)
    {

        if (!$request->ajax()) {
            return abort(404);
        }

        return $next($request);
    }
}
