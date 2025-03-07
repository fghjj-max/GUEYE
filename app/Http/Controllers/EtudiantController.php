<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants= Etudiant::all();
        return view('etudiant.etudiant',compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $etudiant= new Etudiant();
        $classes= Classe::all();
        return view('etudiant.addEtudiant',compact('etudiant','classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $request->validate(
            [
                'nom_etudiant' =>  'required',
                'prenom_etudiant' =>  'required',
                'dateNaissance_etudiant' =>  'required',
                'email_etudiant' =>  'required',
                'telephone_etudiant' =>  'required',
                'nom_classes' => 'required|exists:classes,id',
            ]
        );

        // Renommer nom_classes en classe_id pour l'insertion
        $result['classe_id'] = $result['nom_classes'];
        unset($result['nom_classes']);

        Etudiant::create($result);
        return redirect('etudiant')->with('success', 'Etudiant ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        $etudiant = Etudiant::find($id);
        $classes = Classe::all();
        return view('etudiant.addEtudiant', compact('etudiant', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $result = $request->validate([
            'nom_etudiant' => 'required',
            'prenom_etudiant' => 'required',
            'dateNaissance_etudiant' => 'required',
            'email_etudiant' => 'required',
            'telephone_etudiant' => 'required',
            'nom_classes' => 'required|exists:classes,id',
        ]);

        $etudiant = Etudiant::find($request->id);

        // Utiliser les mêmes noms de champs que dans store()
        $etudiant->nom_etudiant = $request->nom_etudiant;
        $etudiant->prenom_etudiant = $request->prenom_etudiant;
        $etudiant->dateNaissance_etudiant = $request->dateNaissance_etudiant;
        $etudiant->email_etudiant = $request->email_etudiant;
        $etudiant->telephone_etudiant = $request->telephone_etudiant;
        $etudiant->classe_id = $request->nom_classes; // Mettre à jour la relation avec la classe

        $etudiant->save();
        return redirect('etudiant')->with('success', 'Étudiant modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $ev =new Etudiant();
        $ev->find($id)->delete();
        return to_route('etudiant.etudiant');
    }
    //
}
