<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Signature
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $headersNames = 'x-appication-name')
    {
    
        $response = $next($request);
        $response->headers->set($headersNames, config('app.name'));
        return $response;


    }
}
