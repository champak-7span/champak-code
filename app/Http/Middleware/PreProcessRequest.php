<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreProcessRequest
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->has('limit')) {
            $request->merge(['limit' => config('site.pagination.limit')]);
        }

        if (Auth::check()) {
            // if ($request->method() == 'POST') {
            //     $request->merge(['created_by'=> Auth::user()->id]);
            // }

            // if ($request->method() == 'PUT' || $request->method() == 'PATCH') {
            //     $request->merge(['updated_by'=> Auth::user()->id]);
            // }
            ($request->method() == 'POST' ? $request->merge(['created_by'=> Auth::user()->id]) : $request->merge(['updated_by'=> Auth::user()->id]));
        }

        if ($request->has('search')) {
            $filter = $request->filter;
            $filter['search'] = $request->search;
            $request->merge(['filter' => $filter]);
        }

        return $next($request);
    }
}
