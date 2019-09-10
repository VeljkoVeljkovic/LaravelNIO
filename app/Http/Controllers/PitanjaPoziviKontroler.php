<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poziv;
use App\PitanjaPoziv;

class PitanjaPoziviKontroler extends Controller
{

     public function dodaj(Request $request)
    {
        $this->validate($request, [
          'pitanje' => 'required',
          'idPoziv' => 'required'
        ]);
       
        $id = $request->input('idPoziv');
        
        $pitanjePoziv = new PitanjaPoziv;
        $pitanjePoziv->pitanje = $request->input('pitanje');
        $pitanjePoziv->pozivi_idPoziv = $request->input('idPoziv');
        $pitanjePoziv->save();

         //Eloquent veza izbacuje sva pitanja za odredjeni poziv radi isto sto i join...
         $pitanja= Poziv::find($pitanjePoziv);
         $poziv = $pitanja->pitanja;
         return view('poziv.pozivi_detalji' , compact('poziv'));
    }

     public function obrisi(Request $request)
    {

        $idPoziv = $request->input('idpoziv');
        $idPitanja = $request->input('idpitanja');
        $brisanje = new PitanjaPoziv;
        $brisanje = PitanjaPoziv::find($idPitanja);
        $brisanje->delete();


        $pitanja= Poziv::find($idPoziv);
        $poziv = $pitanja->pitanja;


         return view('poziv.pozivi_detalji' , compact('poziv'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
}
