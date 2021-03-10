<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Tuteur;
use App\Models\Level;
use App\Models\Mensualite;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eleves = Eleve::paginate(15);
        return view('eleves.index', compact('eleves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tuteur $tuteur)
    {
        $niveaux = Level::all();
        return view ('eleves.create', compact('niveaux','tuteur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tuteur $tuteur)
    {
        $data= request()->validate([
            'prenom'=>'required',
            'nom'=>'required',
            'naissance'=>'required',
            'sexe'=>'required',
            'niveau'=> 'required',
          ]);
          $data = array_merge($data, ['tuteur_id'=>$tuteur->id]);
          Eleve::create($data);
          return redirect('tuteurs/'.$tuteur->id); 
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eleve  $eleve
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $eleve= Eleve::find($id);
        $mensualites = Mensualite::where('id','=',$id)->paginate(15);
        return view('eleves.show', compact('eleve', 'mensualites'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eleve  $eleve
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $eleve = Eleve::find($id);
      $niveaux = Level::all();
      $tuteurs = Tuteur::all();
      return view('eleves.edit',compact('eleve','niveaux','tuteurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eleve  $eleve
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd(intval($request->input('niveau')));
        $data= request()->validate([
            'prenom'=>'required',
            'nom'=>'required',
            'naissance'=>'required',
            'sexe'=>'required',
            'niveau'=> 'required',
            'tuteur_id'=> 'required',
          ]);
          $eleve = Eleve::find($id);
          $eleve->update($data);
          return redirect('eleves/'.$eleve->id); 
    }
    public function niveau(Request $request)
    {
       $level = $request->input('niveau');
       $id = intval($level);
       return Level::select('titre')->where('id','=',$id)->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eleve  $eleve
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eleve $eleve)
    {
        $eleve->delete();
        return redirect('/eleves');
    } 
}
