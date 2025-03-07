<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Cour;
use App\Models\Professeur;
use Illuminate\Http\Request;

class ProfCourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cours= Cour::all();
        $professeurs = Professeur::all();
        return view('profcour.profcour', compact('cours', 'professeurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $professeurs = Professeur::all();
        $cours = Cour::all();
        return view('profcour.addProfcour',compact('cours', 'professeurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'professeur_id' => 'required|exists:professeurs,id',
            'cour_id' => 'required|exists:cours,id',
        ]);

        $professeur = Professeur::findOrFail($request->professeur_id);
        $professeur->cours()->attach($request->cour_id);

        return redirect()->route('profcour.profcour')->with('success', 'Professeur assigné à la classe avec succès');
    }

    //
}
