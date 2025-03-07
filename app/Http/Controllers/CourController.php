<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use Illuminate\Http\Request;

class CourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cours= Cour::all();
        return view('cour.cour',compact('cours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cour = new Cour();
        return view('cour.addCour',compact('cour'));
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

       Cour::create($result);

        return redirect('cour')->with('success','Cour ajoute avec succes');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ev = Cour::findOrFail($id);
        return view('cour.showCour',compact('ev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cour= Cour::find($id);
        return view('cour.addCour',compact('cour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $cour = Cour::find($request['id']);
        $cour->nom_cours = $request['nom_cours'];

        $cour->save();
        return redirect('cour')->with('success','Cours modidie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $ev =new Cour();
        $ev->find($id)->delete();
        return to_route('cour.cour');
    }    //
}
