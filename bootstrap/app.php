<?php

use Illuminate\Foundation\Application;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
            $middleware->alias([
                'login' => \App\Http\Middleware\CheckIfAuthenticated::class,
                'customer.login' => \App\Http\Middleware\CustomerAuth::class,
                'admin.login' => \App\Http\Middleware\Adminlogin::class,
                'check.permission' => \App\Http\Middleware\Permissioncheck::class,
                'vendor.login' => \App\Http\Middleware\VendorCheck::class,
            ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => $e->getMessage(),
                ], 401);
            }else{
                
            }
        });
    })->create();
