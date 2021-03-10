<?php

namespace App\Http\Controllers;

use App\Models\Tuteur;
use App\Models\Eleve;
use Illuminate\Http\Request;

class TuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tuteurs = Tuteur::paginate(10);
        return view('tuteurs.index', compact('tuteurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tuteurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= request()->validate([
            'prenom'=>'required',
            'nom'=>'required',
            'telephone'=>'required',
            'email'=>'email',
            'adresse'=> 'max:100',
            'sexe'=>'required',
          ]);
           $tuteur = Tuteur::create($data);
           return redirect('/tuteurs/'.$tuteur->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tuteur  $tuteur
     * @return \Illuminate\Http\Response
     */
    public function show(Tuteur $tuteur)
    {
        $eleves = Eleve::where('tuteur_id', '=', $tuteur->id)->get();
        return view('tuteurs.show', compact('tuteur', 'eleves'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tuteur  $tuteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Tuteur $tuteur)
    {
        return view('tuteurs.edit', compact('tuteur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tuteur  $tuteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tuteur $tuteur)
    {
        $data= request()->validate([
            'prenom'=>'required',
            'nom'=>'required',
            'telephone'=>'required',
            'email'=>'email',
            'adresse'=> 'max:100',
            'sexe'=>'required',
          ]);
           $tuteur->update($data);
           return redirect()->route('tuteurs.show', ['tuteur' => $tuteur]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tuteur  $tuteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tuteur $tuteur)
    {
        $tuteur->delete();
        return redirect('/tuteurs');
     
    }
}
