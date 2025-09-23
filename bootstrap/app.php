<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //config middleware here
            $middleware->alias([
        'is_admin' => \App\Http\Middleware\IsAdmin::class,
        ]);

    // you can also attach it to an existing group, e.g. 'web', if needed:
    // $middleware->appendToGroup('web', [
    //     \App\Http\Middleware\IsAdmin::class,
    // ]);

    // or prepend, depending on order
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
