<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Emploie;
use App\Models\Professeur;
use Illuminate\Http\Request;

class EmpProfController extends Controller
{
    public function index()
    {
        $professeurs = Professeur::all();
        $emploies = Emploie::all();
        return view('empprof.empprof', compact('professeurs', 'emploies'));
    }

    /**
     * Show the form for creating a new relationship.
     */
    public function create()
    {
        $emploies = Emploie::all();
        $professeurs = Professeur::all();
        return view('empprof.addEmpprof', compact('professeurs', 'emploies'));
    }

    /**
     * Store a newly created relationship in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'emploie_id' => 'required|exists:emploies,id',
            'professeur_id' => 'required|exists:professeurs,id',
        ]);

        $emploie = Emploie::findOrFail($request->emploie_id);
        $emploie->professeurs()->attach($request->professeur_id);

        return redirect()->route('empprof.empprof')->with('success', 'Un Programme assigné à  un Professeur avec succès');
    }








    //
}
