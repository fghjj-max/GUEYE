<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Emploie;
use App\Models\Professeur;
use Illuminate\Http\Request;

class EmpClasseController extends Controller
{
    public function index()
    {
        $classes = Classe::all();
        $emploies = Emploie::all();
        return view('empclasse.empclasse', compact('classes', 'emploies'));
    }

    /**
     * Show the form for creating a new relationship.
     */
    public function create()
    {
        $classes = Classe::all();
        $emploies = Emploie::all();
        return view('empclasse.addEmpclasse', compact('classes', 'emploies'));
    }

    /**
     * Store a newly created relationship in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'emploie_id' => 'required|exists:emploies,id',
            'classe_id' => 'required|exists:classes,id',
        ]);

        $emploie = Emploie::findOrFail($request->emploie_id);
        $emploie->classes()->attach($request->classe_id);

        return redirect()->route('empclasse.empclasse')->with('success', 'Professeur assigné à la classe avec succès');
    }








    //
}
