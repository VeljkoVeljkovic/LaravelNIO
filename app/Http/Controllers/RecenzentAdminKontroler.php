<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recenzent;
use App\Projekat;
use App\OblastStrucnosti;
use App\ProjekatRecenzent;

class RecenzentAdminKontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sviRecenzenti = Recenzent::all();


        return view('recenzent.admin_svi_recenzenti')->with('sviRecenzenti', $sviRecenzenti);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idRecenzent = $request->input('idRecenzent');
        $idProjekat = $request->input('idProjekat');
        $rokZaIzvestaj = $request->input('rokZaIzvestaj');
        $recenzent = Recenzent::find($idRecenzent);
        $dodela =   $recenzent->projekats()->attach($idProjekat, ['rokZaIzvestaj' =>$rokZaIzvestaj]);
     return $this->show($idRecenzent);
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $recenzent = Recenzent::find($id);

       $angazovanje = $recenzent->projekats;
      //  dd($angazovanje);
        $kor = $recenzent->useri;
        $korIme=$kor->name;
        $projekti = Projekat::all();


        return view('recenzent.admin_recenzent_detalji', compact('recenzent', 'korIme', 'angazovanje', 'projekti'));
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
            
            $stanjePrijave = Recenzent::find($id);
            $stanjePrijave->stanjePrijave = $request->input('status');
            $stanjePrijave->save();
            return $this->show($id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
