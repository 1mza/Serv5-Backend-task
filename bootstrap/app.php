<?php

use App\Http\Middleware\AdminAuthenticated;
use App\Http\Middleware\AdminRedirectIfAuthenticated;
use App\Http\Middleware\UserAuthenticated;
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
        $middleware->alias([
            'admin.authenticated' => AdminAuthenticated::class,
            'user.authenticated' => UserAuthenticated::class,
            'admin.redirect.authenticated' => AdminRedirectIfAuthenticated::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
