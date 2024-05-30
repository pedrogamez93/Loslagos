<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogRouteMiddleware
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
        Log::info('Middleware triggered for route', ['url' => $request->url(), 'method' => $request->method()]);

        $response = $next($request);

        Log::info('Response status', ['status' => $response->status()]);

        return $response;
    }
}
