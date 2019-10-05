<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Ocene;
use App\PitanjaPoziv;
use App\Recenzent;
use App\Projekat;
use App\OblastStrucnosti;
use App\ProjekatRecenzent;

class RecenzentOcenjivanjeProjektaKontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // dd(Auth::user()->id);
        $recenzent = User::find(Auth::user()->id)->recenzent;
        $mojProjekat = $recenzent->projekats;

        return view('projekat.recenzent_projekti', compact( 'mojProjekat'));
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
      $data = request()->validate([
          'ocena' => 'required',
          'ocenaProjekta' => 'required',
      ]);
      $id = $request->input('idProjekat');
      $ocena= new Ocene;
      $ocena->ocenaProjekta = $request->input('ocenaProjekta');
      $ocena->komentarOcene = $request->input('ocena');
      $ocena->pitanjaPoziv_idPitanja = $request->input('id');
      $ocena->projekatRecenzent_id = $request->input('projekatRadi');
      $ocena->save();

      //Nakon sto se unese ocena ponovo se ucitava strana sa podacima i svezim podacima ocenjivanja preko metode show
      return $this->show($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Preko elokventne metode izvlaci se idRecenzneta
        $user = User::find(Auth::user()->id)->recenzent;
        $userId = $user->idRecenzent;
        //Izvlaci se id poziva kome pripada projekat i id samog projekta
        $projekat = Projekat::find($id);
        $pozivProjekta = $projekat->pozivi_idPoziv;
        $projekatR= $projekat->idProjekat;

        //Preko id Projekta i id Recenzneta izvlaci se primarni kljuc u tabeli recenzent_radi da bi kasnije to uacili u tabelu ocene
        $radi = DB::table('projekat_recenzent')->where('p_idProjekat', $projekatR)->where('r_idRecenzent', $userId)->get();
        $radiId = $radi->first()->id;
       // $ocene = PitanjaPoziv::with(['poziv', 'ocene' ])->where('pozivi_idPoziv', $projekat);

       //Izvlaci sve pitanja za odredjeni projekat spojeno sa svim ocenama koje je apl. dao kao odgovore na pitanja projekta
        $ocena = DB::table('pitanja_pozivi as p')
        ->leftJoin('ocene as o', function ($join) use($radiId) {
            $join->on('p.idPitanja', '=', 'o.pitanjaPoziv_idPitanja')
                 ->where('o.projekatRecenzent_id', '=', $radiId);
        })
        ->leftJoin('projekat_recenzent as pr', 'o.projekatRecenzent_id','=', 'pr.id' )
        ->where('p.pozivi_idPoziv','=',$pozivProjekta)
        ->get();

       return view('projekat.recenzent_projekat_obrada', compact( 'ocena', 'radi', 'projekat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $projekatRadi = $request->input('projekatRadi');
        $zakljucaj = $request->input('zakljucavanje');
        $idProjekat = $request->input('idProjekat');
        $kraj = $request->input('kraj');
      //  dd($kraj);
          if($zakljucaj)
          {
            $zaklucavanje = Ocene::find($id);

            $zaklucavanje->statusOcene = $zakljucaj;
            $zaklucavanje->save();
          } else if($kraj)
          {

             $krajObrade = ProjekatRecenzent::find($projekatRadi);
             $krajObrade->stanjePrijave = $kraj;
             $krajObrade->update();
              return redirect('ocenjivanjeprojekta')->with('status', 'Recenzija projekta je uspešno završena i predat je izveštaj.');

          }
             else
          {
            $ocenaIzmena= Ocene::find($id);
            $ocenaIzmena->ocenaProjekta = $request->input('ocenaProjekta');
            $ocenaIzmena->komentarOcene = $request->input('ocena');
            $ocenaIzmena->save();
          }
      //Nakon sto se unese ocena ponovo se ucitava strana sa podacima i svezim podacima ocenjivanja preko metode show
  //    return $this->show($idProjekat);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $idProjekat = $request->input('idProjekat');
        $brisanje = Ocene::find($id);
        $brisanje->delete();

        //Nakon sto se unese ocena ponovo se ucitava strana sa podacima i svezim podacima ocenjivanja preko metode show
        return $this->show($idProjekat);

    }
}
