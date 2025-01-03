<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presence;
use Illuminate\Support\Facades\Auth;

class PresenceController extends Controller
{
    public function index()
    {
        $presences = Presence::where('user_id', Auth::id())->get();
        return view('presence.index', compact('presences'));
    }

    public function store(Request $request)
    {
        $presence = Presence::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'date' => now()->toDateString(),
            ],
            [
                'time_in' => $request->input('time_in', now()->toTimeString()),
                // N'ajouter l'heure de sortie que si elle est spécifiée
                'time_out' => $request->filled('time_out') ? $request->input('time_out') : null,
            ]
        );
    
        // Retourner un message de succès
        return redirect()->back()->with('success', 'Votre présence a été enregistrée.');
    }
    //
}
