<?php

namespace App\Http\Controllers;

use App\Models\Emploie;
use Illuminate\Http\Request;

class EmploieController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emploies= Emploie::all();
        return view('emploie.emploie',compact('emploies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $emploie = new Emploie();
        return view('emploie.addEmploie',compact('emploie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result =   $request->validate(
            [
                'jour' =>  'required',
                'heureDebut' =>  'required',
                'heureFin' =>  'required',
            ]
        );
        Emploie::create($result);
        return redirect('emploie')->with('success',' Un Nouveau Programme a ete ajouter ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ev = Emploie::findOrFail($id);
        return view('emploie.showEmploie',compact('ev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $emploie= Emploie::find($id);
        return view('emploie.addEmploie',compact('emploie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $emploie = Emploie::find($request['id']);
        $emploie  ->jour = $request['jour'];
        $emploie  ->heureDebut = $request['heureDebut'];
        $emploie  ->heureFin = $request['heureFin'];
        $emploie  ->save();
        return redirect('emploie')->with('success','Le Programme est  modifie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $ev =new Emploie();
        $ev->find($id)->delete();
        return to_route('emploie.emploie');
    }
    //
    //
}
