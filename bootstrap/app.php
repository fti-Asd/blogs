<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__ . '/../routes/web.php',
            __DIR__ . '/../routes/auth.php',
            __DIR__ . '/../routes/admin.php',
        ],
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware
            ->redirectGuestsTo(function (Request $request) {
                if ($request->is(['admin/*', 'admin/', 'admin'])) {
                    return route('admin.auth.login.index');
                }

                return route('auth.login.index');
            })
            ->redirectUsersTo(function (Request $request) {
                if ($request->is(['admin/*', 'admin/', 'admin'])) {
                    return route('admin.dashboard');
                }

                return route('account.profile');

            });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
