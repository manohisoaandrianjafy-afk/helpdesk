<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if ($request->user()->role === 'admin') {
            return $next($request);
        } else {
            return response()->json([
                'message' => 'Tu es authentifié, mais tu n as pas le droit.'
            ], 403);
        }

    }
}
