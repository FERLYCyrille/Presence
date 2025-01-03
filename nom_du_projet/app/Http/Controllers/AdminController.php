<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presence;

class AdminController extends Controller
{
    public function showPresences()
    {
        // Récupère toutes les présences de la base de données
        if (auth()->check() && auth()->user()->is_admin) {
            // Récupère toutes les présences de la base de données
            $presences = Presence::with('user') // Charge les utilisateurs associés
                                 ->orderBy('date', 'desc') // Trie par date décroissante
                                 ->get();

            // Retourne la vue avec les présences
            return view('admin.presences', compact('presences'));
        }

        // Si l'utilisateur n'est pas un administrateur, redirige vers la page d'accueil
        return redirect('/');
    }
    //
}
