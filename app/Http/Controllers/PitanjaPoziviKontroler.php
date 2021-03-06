<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poziv;
use App\PitanjaPoziv;

class PitanjaPoziviKontroler extends Controller
{




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

        $pitanja= Poziv::find($id);
        $poziv = $pitanja->pitanja;
     // dd($poziv);
        return view('poziv.pozivi_detalji' , compact('poziv', 'pitanja'));
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
    public function destroy(Request $request, $id)
    {


        $idpoziv = PitanjaPoziv::find($id);
        $brisanje = new PitanjaPoziv;
        $brisanje = PitanjaPoziv::find($id);
        $brisanje->delete();

        $id = $idpoziv->pozivi_idPoziv;

        $pitanja= Poziv::find($id);
        $poziv = $pitanja->pitanja;


        return view('poziv.pozivi_detalji' , compact('poziv', 'pitanja'));
    }
}


