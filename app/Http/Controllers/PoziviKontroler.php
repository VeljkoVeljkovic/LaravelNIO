<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poziv;
use App\PitanjaPoziv;
class PoziviKontroler extends Controller
{
   public function index()
   {
    $pozivi = Poziv::orderBy('created_at','desc')->paginate(10);
    return view('poziv.pozivi')->with('pozivi', $pozivi);
   }

    public function store(Request $request)
    {
        $this->validate($request, [
            'naziv' => 'required'
        ]);
        $poziv = new Poziv;
        $poziv->naziv = $request->input('naziv');
        $poziv->save();
        return redirect('/pozivi');
    }


    /**
     *
     */
    public function show($id)
    {
    // dd($id);
//    $pitanja = PitanjaPoziv::where('pozivi_idPoziv', $id)->get();
//     $pitanje = Poziv::find($id);

         $pitanja= Poziv::find($id);
         $poziv = $pitanja->pitanja;
     //  dd($pitanja);
      return view('poziv.pozivi_detalji' , compact('poziv', 'pitanja'));
  
    }
}
