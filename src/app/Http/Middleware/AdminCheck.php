<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminCheck
{
    public function handle(Request $request, Closure $next): Response
    {
        // URL に ?key=ok が無いと403にする
        if ($request->query('key') !== 'ok') {
            return response("Access Denied", 403);
        }

        return $next($request);
    }
}
