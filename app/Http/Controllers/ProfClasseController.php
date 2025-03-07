<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Professeur;
use Illuminate\Http\Request;

class ProfClasseController extends Controller
{
    public function index()
    {
        $classes = Classe::all();
        $professeurs = Professeur::all();
        return view('profclasse.profclasse', compact('classes', 'professeurs'));
    }

    /**
     * Show the form for creating a new relationship.
     */
    public function create()
    {
        $classes = Classe::all();
        $professeurs = Professeur::all();
        return view('profclasse.addProfclasse', compact('classes', 'professeurs'));
    }

    /**
     * Store a newly created relationship in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'professeur_id' => 'required|exists:professeurs,id',
            'classe_id' => 'required|exists:classes,id',
        ]);

        $professeur = Professeur::findOrFail($request->professeur_id);
        $professeur->classes()->attach($request->classe_id);

        return redirect()->route('profclasse.profclasse')->with('success', 'Professeur assigné à la classe avec succès');
    }








    //
}
