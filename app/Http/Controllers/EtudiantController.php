<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiant= Etudiant::all();
        return view('etudiant',compact('etudiant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $etudiant= new Etudiant();
        return view('addEtudiant',compact('etudiant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //Validation
        $result =   $request->validate(
            [
                'nom_etudiant' =>  'required',
                'prenom_etudiant' =>  'required',
                'date_naissance' =>  'required',
                'email_etudiant' =>  'required',
                'telephone_etudiant' =>  'required',

            ]
        );

        Etudiant::create($result);

        return redirect('etudiant')->with('success',' Etudiant ajoute avec succes');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ev = Etudiant::findOrFail($id);
        return view('showClasse',compact('ev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $etudiant=Etudiant::find($id);
        return view('addClasse',compact('etudiant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $etudiant = Etudiant::find($request['id']);
        $etudiant->Nom = $request['nom_etudiant'];
        $etudiant->Prenom = $request['prenom_etudiant'];
        $etudiant->Date_Naissance = $request['dateNaissance_etudiant'];
        $etudiant->Email = $request['email_etudiant'];
        $etudiant->Telephone = $request['telephone_etudiant'];

        $etudiant->save();
        return redirect('etudiant')->with('success','Etudiant modidie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $ev =new Etudiant();
        $ev->find($id)->delete();
        return to_route('etudiant');
    }
    //
}
