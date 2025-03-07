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
        $classes= Classe::all();
        return view('classe.classe',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classe = new Classe();
        return view('classe.addClasse',compact('classe'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result =   $request->validate(
            [
                'nom_classes' =>  'required',
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
        return view('classe.showClasse',compact('ev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classe= Classe::find($id);
        return view('classe.addClasse',compact('classe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $classe = Classe::find($request['id']);
        $classe ->nom_classes = $request['nom_classes'];
        $classe ->save();
        return redirect('classe')->with('success','Classe modidie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $ev =new Classe();
        $ev->find($id)->delete();
        return to_route('classe.classe');
    }
    //
}
