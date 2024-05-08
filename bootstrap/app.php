<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Http\Middleware\AdminGuard;
use App\Http\Middleware\DashboardGuard;
//use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'admin'=> AdminGuard::class,
            'dashboard'=> DashboardGuard::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
