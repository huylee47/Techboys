<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        return [
            'auth' => \App\Http\Middleware\Authentication::class,
            'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        ];
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
