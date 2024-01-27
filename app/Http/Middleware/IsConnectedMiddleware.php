<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsConnectedMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('user')) {
            return $next($request);
        } else {
            flash()->addError('Vous devez être connecté pour accéder à cette page');
            return redirect()->route('home');
        }
    }
}
