<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class LoginController extends Controller
{
    use LivewireAlert;
    public function login(Request $request)
    {
        if($request->get('logged') == true) {
            $userApi = new \App\Services\VortechAPI\User();
            try {
                \Session::push('user_uuid', $request->get('user_uuid'));
                $user = $userApi->info()->user;
                \Session::push('user', $user);
                flash()->addSuccess("Connexion effectuer avec succès", "Bienvenue $request->name");
                return redirect()->intended();
            }catch (\Exception $e) {
                flash()->addError("Connexion échouer", "Erreur lors de la récupération des informations de l'utilisateur");
                return redirect()->intended();
            }
        } else {
            flash()->addError("Connexion échouer", "Veuillez vérifier vos informations de connexion");
            return redirect()->intended();
        }
    }

    public function logout(Request $request)
    {
        \Session::flush();
        flash()->addSuccess("Déconnexion effectuer avec succès", "A bientôt");
        return redirect()->intended();
    }
}
