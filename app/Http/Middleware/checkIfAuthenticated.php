<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('api/admin/login')) {
            // print_r(auth()->user());
            // die;
            if (auth()->check()) {
                // print_r("123456");die;
                return response()->json([
                    'message' => 'Please logout first to login again.',
                ], 401);
            }
        }
        return $next($request);   
    }
        return $next($request);
    }
}
