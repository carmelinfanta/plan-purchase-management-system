<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\AlreadyLoggedIn;
use Stripe\Webhook;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(['isLoggedIn' => AuthCheck::class,
                            'alreadyLoggedIn'=> AlreadyLoggedIn::class]);
        // $middleware->alias(['alreadyLoggedIn' => AlreadyLoggedIn::class]);
        $middleware->validateCsrfTokens(except: [
            '/webhook'
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
