<?php

namespace App\Http\Controllers;

use App\Models\Mensualite;
use App\Models\Level;
use App\Models\Eleve;
use Illuminate\Http\Request;

class MensualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensualites = Mensualite::paginate(15);
        return view('mensualites.index', compact('mensualites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Eleve $elefe)
    {
        $eleves = Eleve::all();
        $niveaux = Level::all();
        return view('mensualites.create', compact('eleves', 'niveaux', 'elefe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Eleve $elefe)
    {
        $data = request()->validate([
          'mois' => 'required',
          'net_a_payer'=> 'required',
          'montant_verser' => 'required',
          'montant_restant' => 'required',
          'niveau'=> 'required',
        ]);
        $data = array_merge($data, ['eleve_id'=>$elefe->id]);
        Mensualite::create($data);
        return redirect('/eleves/'.$elefe->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mensualite  $mensualite
     * @return \Illuminate\Http\Response
     */
    public function show(Mensualite $mensualite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mensualite  $mensualite
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mensualite=  Mensualite::find($id);
        $niveaux = Level::all();
        $eleves = Eleve::all();
        return view('mensualites.edit', compact('mensualite','niveaux', 'eleves'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mensualite  $mensualite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mensualite $mensualite)
    {
        $data = request()->validate([
            'mois' => 'required',
            'net_a_payer'=> 'required',
            'montant_verser' => 'required',
            'montant_restant' => 'required',
            'niveau'=> 'required',
          ]);
          $mensualite->update($data);
          return redirect('/mensualites/'.$mensualite->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mensualite  $mensualite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mensualite $mensualite)
    {
        //
    }
}
