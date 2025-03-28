<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException;

class checkIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('api/admin/login')) {
            try {
                // Check if a valid JWT token exists
                if (JWTAuth::parseToken()->authenticate()) {
                    return response()->json([
                        'message' => 'Please logout first to login again.',
                    ], 401);
                }
            } catch (TokenExpiredException $e) {
                // Token has expired, allow login
            } catch (TokenInvalidException $e) {
                // Token is invalid, allow login
            } catch (JWTException $e) {
                // No token provided, allow login
            }
        }
        return $next($request);   
     }
}
