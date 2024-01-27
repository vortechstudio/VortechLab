<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SharedViewDataMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (\Session::has('user_uuid')) {
            if (\Session::has('user')) {
                \View::share('user', \Session::get('user')[0]);
            } else {
                $apiUser = new \App\Services\VortechAPI\User();
                try {
                    $user = $apiUser->info()->user;
                    \Session::push('user', $user);
                    \View::share('user', \Session::get('user')[0]);
                } catch (\Exception $e) {
                    flash()->addError('Connexion échouer', "Erreur lors de la récupération des informations de l'utilisateur");

                    return redirect()->intended();
                }
            }
        }

        return $next($request);
    }
}
