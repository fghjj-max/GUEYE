<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professeur= Professeur::all();
        return view('professeur',compact('professeur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $professeur = new Professeur();
        return view('addProfesseur',compact('professeur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //Validation
        $result =   $request->validate(
            [
                'nom_professeur' =>  'required',
                'prenom_professeur' =>  'required',
                'email_professeur' =>  'required',
                'telephone_professeur' =>  'required',

            ]
        );

        Professeur::create($result);

        return redirect('professeur')->with('success','Professeur ajoute avec succes');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ev = Professeur::findOrFail($id);
        return view('showProfesseur',compact('ev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $professeur= Professeur::find($id);
        return view('addProfesseur',compact('professeur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $professeur = Professeur::find($request['id']);
        $professeur->Nom = $request['nom_professeur'];
        $professeur->Prenom = $request['prenom_professeur'];
        $professeur->prix = $request['email_professeur'];
        $professeur->date = $request['telephone_professeur'];
        $professeur->save();
        return redirect('professeur')->with('success','Professeur modidie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $ev =new Professeur();
        $ev->find($id)->delete();
        return to_route('professeur');
    }
    //
}
