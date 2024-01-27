<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __invoke()
    {
        if (\Session::has('user_uuid')) {
            if(\Session::has('user')) {
                return redirect('/home');
            } else {
                $apiUser = new \App\Services\VortechAPI\User();
                try {
                    $user = $apiUser->info()->user;
                    \Session::push('user', $user);
                    return redirect('/home');
                } catch (\Exception $e) {
                    flash()->addError("Connexion échouer", "Erreur lors de la récupération des informations de l'utilisateur");
                    return redirect()->intended();
                }
            }
        } else {
            return redirect('/home');
        }
    }
}
