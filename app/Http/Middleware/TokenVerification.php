<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TokenVerification
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->hasHeader('Authorization')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $token = $request->header('Authorization');

        if ($token !== 'your-secret-token') {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}

