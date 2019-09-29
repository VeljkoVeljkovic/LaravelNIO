<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Poziv;
use App\Projekat;
use App\Ocene;
use App\ProjekatRecenzent;
use Illuminate\Support\Facades\Storage;
class ProjekatKontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


public function pretragaProjakata(Request $request)
{

    $naziv = $request->input('naziv');
    $oblastProjekta = $request->input('oblastProjekta');

    if(!empty($oblastProjekta))
    {
        $Projektifilter = DB::table('projekat')
        ->where('oblastProjekta', $oblastProjekta)
        ->orWhere('nazivProjekta', 'like', '%$naziv%')
        ->get();
    }
    else
    {

//            $s = DB::table('projekat')->get();
//            dd($s);

        $Projektifilter = DB::table('projekat')
            ->where('nazivProjekta', 'like', "%" . $naziv . "%")
            ->get();
           //dd($sviProjekti);

    }

       return view('projekat.admin_pretraga_projekta')->with('sviProjekti', $Projektifilter);


}
    //Uccitava sve postojece projekte na admin stranici svi projekti

    public function index()
    {
        $sviProjekti = Projekat::all();
        return view('projekat.admin_svi_projekti')->with('sviProjekti', $sviProjekti);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pozivi = Poziv::orderBy('created_at','desc')->paginate(10);
        return view('projekat.kreiraj_projekat')->with('pozivi', $pozivi);
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
            'nazivProjekta' => 'required',
            'rukovodiocProjekta' => 'required',
            'NIORukovodioca' => 'required',
            'zvanjeRukovodioca' => 'required',
            'angazovanjeRukovodioca' => 'required',
            'oblastProjekta' => 'required',
            'odlukaProjekta' => 'required',
            'idPoziva' => 'required',
            'dokument' => ['required', 'mimes:pdf'],
        ]);

        $file = $request->file('dokument');

        $nazivDirektorijuma = $request->input('nazivProjekta');

        if(!is_dir(public_path('/uploads/'.$nazivDirektorijuma)))
            mkdir(public_path('/uploads/'.$nazivDirektorijuma), 0777, TRUE);
        $uniqueFileName = $file->getClientOriginalName();

        $file->move(public_path('/uploads/'.$nazivDirektorijuma), $uniqueFileName);






        $date = date("Y-m-d H:i:s");
        $projekat= new Projekat;
        $projekat->nazivProjekta = $request->input('nazivProjekta');
        $projekat->rukovodiocProjekta = $request->input('rukovodiocProjekta');
        $projekat->NIOrukovodioc = $request->input('NIORukovodioca');
        $projekat->zvanjeRukovodioca = $request->input('zvanjeRukovodioca');
        $projekat->angazovanjeRukovodioca = $request->input('angazovanjeRukovodioca');
        $projekat->oblastProjekta = $request->input('oblastProjekta');
        $projekat->datumPodnosenja = $date;
        $projekat->odlukaProjekta = $request->input('odlukaProjekta');
        $projekat->pozivi_idPoziv = $request->input('idPoziva');
        $projekat->save();
        return redirect('/pozivi');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projekat = Projekat::find($id);
        $recenzenti = $projekat->recenzents;
        $poziv = $projekat->pozivi_idPoziv;
        $pitanja = Poziv::find($poziv)->pitanja()->get();
      //  $directory =  Storage::files('app');

        $projekatRadi = Projekat::find($id)->projekatRadi()->get();
        if(count($projekatRadi)>0) {
        $ocena = ProjekatRecenzent::find($projekatRadi[0]->id)->ocenaProjekatRecenzent()->get();}
        else { $ocena = ""; }
        
        return view('projekat.admin_detalji_projekta', compact('projekat', 'recenzenti', 'pitanja', 'ocena'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projekat = Projekat::find($id);
        $poziv = $projekat->pozivi_idPoziv;
        $pozivSelected = Poziv::find($poziv);
        $sviPozivi = Poziv::all();
        return view('projekat.admin_izmena_projekta', compact('projekat', 'pozivSelected', 'sviPozivi'));
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

            $naziv = Projekat::find($id);
            $nazivDirektorijuma = $naziv->nazivProjekta;
            $uniqueFileName = $file->getClientOriginalName();
            $file->move(public_path('/uploads/'.$nazivDirektorijuma), $uniqueFileName);
        }
        $request->validate([

            'nazivProjekta' => ['required', 'string', 'max:255'],
            'rukovodiocProjekta' => ['required', 'string', 'max:255'],
            'NIORukovodioca' => ['required', 'string', 'max:255'],
            'zvanjeRukovodioca' => ['required', 'string', 'max:255'],
            'angazovanjeRukovodioca' => ['required', 'string', 'max:255'],
            'oblastProjekta' => ['required', 'string', 'max:255'],
            'odlukaProjekta' => ['required', 'string', 'max:255'],
            'idPoziva' => ['required', 'integer', 'max:255'],
         //   'dokument' => ['required', 'mimes:pdf'],


        ]);
        $projekat = Projekat::find($id);
        $projekat->nazivProjekta = $request['nazivProjekta'];
        $projekat->rukovodiocProjekta = $request['rukovodiocProjekta'];
        $projekat->NIOrukovodioc = $request['NIORukovodioca'];
        $projekat->zvanjeRukovodioca = $request['zvanjeRukovodioca'];
        $projekat->angazovanjeRukovodioca = $request['angazovanjeRukovodioca'];
        $projekat->oblastProjekta = $request['oblastProjekta'];
        $projekat->odlukaProjekta = $request['odlukaProjekta'];
        $projekat->pozivi_idPoziv = $request['idPoziva'];
        $projekat->save();

        $uspeh = "Uspešno izvršena izmena!";
        $projekat = Projekat::find($id);
        $poziv = $projekat->pozivi_idPoziv;
        $pozivSelected = Poziv::find($poziv);
        $sviPozivi = Poziv::all();
        return view('projekat.admin_izmena_projekta', compact('projekat', 'pozivSelected', 'sviPozivi', 'uspeh'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $brisanje = new Projekat;
        $brisanje = Projekat::find($id);
        $brisanje->delete();
        return redirect('/projekat')->with('status', 'Uspesno obrisan projekat');
    }
}
