<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use \App\Http\Middleware\MiddleResponseTest;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->web(append: [
        //     guest::class, // php artisan make:middleware MiddleResponseTest
        // ]);
        $middleware->alias([
             //* добавлен для изучения Middlewar
            'middle.response.test' => MiddleResponseTest::class,
        ])
        ->append(MiddleResponseTest::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
