<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recenzent;
use App\OblastStrucnosti;
class RecenzentKontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $korisnik = auth()->user()->id;
        $podaci = User::find($korisnik);
        $recenzent = $podaci->recenzent;
        $oblasti = OblastStrucnosti::all();

        return view('recenzent.izmena_podataka', compact('recenzent', 'oblasti'));

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

        if($request['dokument']!=null){
            $file = $request['dokument'];
            $nazivDirektorijuma = auth()->user()->name;
            $uniqueFileName = $file->getClientOriginalName();
            $file->move(public_path('/recenzenti/'.$nazivDirektorijuma), $uniqueFileName);
        }
        $request->validate([

            'ime' => ['required', 'string', 'max:255'],
            'prezime' => ['required', 'string', 'max:255'],
            'nacionalnost' => ['required', 'string', 'max:255'],
            'zemlja' => ['required', 'string', 'max:255'],
            'NIO' => ['required', 'string', 'max:255'],
            'trenutnaFirma' => ['required', 'string', 'max:255'],
            'naucnoZvanje' => ['required', 'string', 'max:255'],
            'angazovanje' => ['required', 'string', 'max:255'],
            'oblastiStrucnosti' => ['required'],
            'telefon' => array('required', 'regex:/^0[0-9]{7,9}$/'),
            'adresa' => ['required', 'string', 'max:255'],
           // 'dokument' => ['required', 'mimes:pdf'],
            'vebStranica' => ['required', 'string', 'max:255'],

        ]);
        $recenzent = Recenzent::find($id);
        $recenzent->ime = $request['ime'];
        $recenzent->prezime = $request['prezime'];
        $recenzent->nacionalnost = $request['nacionalnost'];
        $recenzent->zemlja = $request['zemlja'];
        $recenzent->NIO = $request['NIO'];
        $recenzent->trenutnaFirma = $request['trenutnaFirma'];
        $recenzent->naucnoZvanje = $request['naucnoZvanje'];
        $recenzent->angazovanje = $request['angazovanje'];
        $recenzent->telefon = $request['telefon'];
        $recenzent->adresa = $request['adresa'];
        $recenzent->vebStranica = $request['vebStranica'];
        $recenzent->user_id = auth()->user()->id;
        $recenzent->oblastStrucnosti_id = $request['oblastiStrucnosti'];
        $recenzent->save();

        return redirect('recenzent');


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
