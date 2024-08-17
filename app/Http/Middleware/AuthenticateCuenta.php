<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthenticateCuenta
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('cuenta_id')) {
            Log::info('Middleware: No hay sesión activa', ['session' => $request->session()->all()]);
            return redirect()->route('cuenta.index')->with('error', 'Debe iniciar sesión para acceder a esta página.');
        }

        return $next($request);
    }
}

