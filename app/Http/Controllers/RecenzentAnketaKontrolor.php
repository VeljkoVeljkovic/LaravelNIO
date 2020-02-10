<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anketa;
use App\User;
use App\AnketaOdgovori;
use App\Recenzent;
class RecenzentAnketaKontrolor extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	
	  $user_id = auth()->user()->id;
      $recenzent = Recenzent::where('user_id', $user_id)->get();
	  $recenzent = Recenzent::find($recenzent[0]->idRecenzent);	
      $ankete = $recenzent->anketas;
     
      //Ova dva reda ispod ovako moze da se izvuce ko radi anketu bez koriscenja pivot modela
	  if(count($ankete) > 0) {
      $anketa=$ankete->toArray();
      $anketastatus = $anketa[0]['pivot']['status']; } else {
		  $anketastatus = "";
	  }
    //  dd($anketastatus);
      return view('anketa.recenzent_ankete', compact('ankete', 'anketastatus'));
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
        $post = $_POST;

        $id = $post['id'];
        $i=0;
        foreach($post as $p) {
          if(!empty($p)) {

            $i++;
          }
        }
        $anketa= Anketa::find($id);
        $anketaPitanja = $anketa->pitanjaAnketa;
       if($i-2==count($anketaPitanja)){
         foreach($post as $key => $odgovor)
           {
              $mykey = $key;
            if($mykey=='_token'||$mykey=='id') {

             }
              else {
               $name= explode("/", $mykey);
               $idAnketuRadi = $name[1];
               $idAnketaPitanje = $name[2];
               $snimanje = new AnketaOdgovori;
               $snimanje->odgovor = $odgovor;
               $snimanje->anketa_idPitanje = $idAnketaPitanje;
               $snimanje->anketa_idAnketuRadi = $idAnketuRadi;
               $snimanje->save();

              }
           }
           $user_id = auth()->user()->id;
           $recenzent = Recenzent::where('user_id', $user_id)->get();
	       $statusAnkete = Recenzent::find($recenzent[0]->idRecenzent);	

         //  $statusAnkete = Recenzent::find(auth()->user()->id);

            $statusAnkete->anketas()->updateExistingPivot($id, ['status' => 'popunjena' ]);

       } else {
         $greska = "Mora se odgovoriti na sva pitanja";
       }

         return redirect('recenzentanketa')->with('status', 'Anketa je uspešno popunjena. Hvala na vremenu koje ste izdvojili.');


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
      $user_id = auth()->user()->id;
      $recenzent = Recenzent::where('user_id', $user_id)->get();
	  $recenzent = Recenzent::find($recenzent[0]->idRecenzent);	
      $ankete = $recenzent->anketas;
   //   $recenzent = Recenzent::find(auth()->user()->id);
  //    $ankete = $recenzent->anketas;
      //Ova dva reda ispod ovako moze da se izvuce ko radi anketu bez koriscenja pivot modela
	  
      $anketa=$ankete->toArray();
      $anketuradi = $anketa[0]['pivot']['idAnketuRadi'];



   return view('anketa.recenzent_anketa_detalji' , compact('anketa', 'anketaPitanja', 'anketuradi'));
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
    public function destroy($id)
    {
        //
    }
}
