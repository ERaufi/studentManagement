<?php

use App\Http\Middleware\GlobalMiddleware;
use App\Http\Middleware\StudentsMiddleware;
use App\Http\Middleware\TeachersMiddleware;
use App\Http\Middleware\TerminableMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        channels: __DIR__ . '/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //

        $middleware->use([
            GlobalMiddleware::class,
            TerminableMiddleware::class,
        ]);
        $middleware->alias([
            'teachers' => TeachersMiddleware::class,
            // 'students' => StudentsMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
