<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TestCors
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set(
            'Access-Control-Allow-Origin',
            'http://127.0.0.1:5173'
        );

        $response->headers->set(
            'Access-Control-Allow-Methods',
            '*'
        );

        $response->headers->set(
            'Access-Control-Allow-Headers',
            '*'
        );

        return $response;
    }
}