<?php

namespace Mahony0\Floc\Classes;

use Closure;

class NoFLoCMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $headers = [
            'Permissions-Policy', 'interest-cohort=()',
        ];

        foreach ($headers as $key => $value) {
            $response->headers->set($key, $value);
        }

        return $response;
    }
}
