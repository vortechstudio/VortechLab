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
            \Session::push('user_uuid', $request->get('user_uuid'));
            flash()->addSuccess("Connexion effectuer avec succès", "Bienvenue $request->name");
            return redirect()->intended();
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
