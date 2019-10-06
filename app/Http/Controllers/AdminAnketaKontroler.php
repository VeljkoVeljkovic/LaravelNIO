<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recenzent;
use App\Anketa;
use App\AnketaPitanja;
class AdminAnketaKontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ankete = Anketa::orderBy('created_at','desc')->paginate(10);
      return view('anketa.admin_ankete')->with('ankete', $ankete);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      $anketa= Anketa::find($id);

    //dd($anketa);
   return view('anketa.admin_anketa_detalji' , compact('anketa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $pitanje = $request->input('pitanje');


      if($request->input('pitanjeS'))
      {

          $slobodnoPitanje = new AnketaPitanja;
          $slobodnoPitanje->pitanje = $request->input('pitanjeS');
          $slobodnoPitanje->anketa_idAnketa = $request->input('id');
          $slobodnoPitanje->save();
      }

       if($pitanje)
      {


          $Pitanje = new AnketaPitanja;
          $Pitanje->pitanje = $request->input('pitanje');
          $Pitanje->odgovor1= $request->input('odgovor1');
          $Pitanje->odgovor2= $request->input('odgovor2');
          $Pitanje->odgovor3= $request->input('odgovor3');
          $Pitanje->odgovor4= $request->input('odgovor4');
          $Pitanje->anketa_idAnketa = $request->input('id');
          $Pitanje->save();
      }


     if($request->input('naziv'))
     {
        $this->validate($request, [
            'naziv' => 'required'
        ]);
        $anketa = new Anketa;
        $anketa->naziv = $request->input('naziv');
        $anketa->save();
        return $this->index();
     }

     if($request->input('recenzent'))
     {
       $idAnketa = $request->input('id');
       $dodela = Recenzent::find($request->input('recenzent'));

        $dodela->anketas()->attach($idAnketa);
     }

    //  return redirect('/pozivi');
    return $this->show($request->input('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $anketa= Anketa::find($id);
      $anketaPitanja = $anketa->pitanjaAnketa;
      $recenzenti = Recenzent::all();


  //  dd($anketaPitanja);
   return view('anketa.admin_anketa_detalji' , compact('anketa', 'anketaPitanja', 'recenzenti'));

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
       $zakljucavanje = Anketa::find($id);
       $zakljucavanje->status = "zakljucana";
       $zakljucavanje->save();
       return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $idAnketa = $request->input('idAnketa');
        $brisanje = AnketaPitanja::find($id);
        $brisanje->delete();
        return $this->show($idAnketa);

    }
}
