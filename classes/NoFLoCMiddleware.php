<?php

namespace Mahony0\Floc;

use Closure;

class NoFLoCMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('Permissions-Policy', 'interest-cohort=()');

        return $response;
    }
}
