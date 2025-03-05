<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classe= Classe::all();
        return view('classe',compact('classe'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classe = new Classe();
        return view('addClasse',compact('classe'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //Validation
        $result =   $request->validate(
            [
                'nom_cours' =>  'required',
            ]
        );

        Classe::create($result);

        return redirect('classe')->with('success','Classe ajoute avec succes');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ev = Classe::findOrFail($id);
        return view('showClasse',compact('ev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classe= Classe::find($id);
        return view('addClasse',compact('classe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $classe = Classe::find($request['id']);
        $classe ->Nom = $request['nom_classe'];
        $classe ->save();
        return redirect('classe')->with('success','Classe modidie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Evenement::destroy($id);
        $ev =new Classe();
        $ev->find($id)->delete();
        return to_route('classe');
    }
    //
}
