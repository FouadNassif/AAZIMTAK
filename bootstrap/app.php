<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Tymon\JWTAuth\Http\Middleware\Authenticate as JWTAuthenticate;
use Tymon\JWTAuth\Http\Middleware\RefreshToken as JWTRefresh;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Register custom middleware (JWT)
        $middleware->alias([
            'jwt.auth' => JWTAuthenticate::class,
            'jwt.refresh' => JWTRefresh::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (Tymon\JWTAuth\Exceptions\TokenExpiredException $e, $request) {
            return response()->json(['error' => 'Token has expired'], 401);
        });

        $exceptions->renderable(function (Tymon\JWTAuth\Exceptions\TokenInvalidException $e, $request) {
            return response()->json(['error' => 'Invalid token'], 401);
        });

        $exceptions->renderable(function (Tymon\JWTAuth\Exceptions\JWTException $e, $request) {
            return response()->json(['error' => 'Token is missing'], 401);
        });
    })
    ->create();
