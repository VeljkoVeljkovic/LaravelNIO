<?php

namespace App\Http\Controllers;
use PHPMailer\PHPMailer;
use Illuminate\Http\Request;
use App\Recenzent;
use App\OblastStrucnosti;
use Illuminate\Support\Facades\DB;
class AdminObavestenjaKontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sviRecenzenti = Recenzent::all();
        $sveOblasti = OblastStrucnosti::all();
          return view('obavestenja.admin_obavestenja', compact('sviRecenzenti', 'sveOblasti'));
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

        if ($request->input('sviRecenzenti')) {
            $recenznet = $request->input('sviRecenzenti');
            $naslov = $request->input('naslov');
            $text = $request->input('obavestenje');
            $email =  Recenzent::find($recenznet)->useri->email;
       //    dd($email);


         //   $text = 'Hello Mail';
            $Mail = new PHPMailer\PHPMailer(); // create a n
            $Mail->SMTPDebug = false;
            $Mail->Mailer = 'smtp';
            $Mail->isSMTP();
            $Mail->Host="smtp.gmail.com";
            $Mail->Port=587;
            $Mail->SMTPSecure="tls";
            $Mail->SMTPAuth = true;
            $Mail->Username="veljkoveljkovic.mdi@gmail.com";
            $Mail->Password="sajbervelja";
            $Mail->SetFrom("veljkoveljkovic.mdi@gmail.com");
            $Mail->Subject = $naslov;
            $Mail->Body = $text;
            $Mail->AddAddress($email);
            if ($Mail->Send()) {
                return 'Obaveštenje uspešno poslato na mail';
            } else {
                return 'Obaveštenje nije uspešno poslato';
            }
        }
        if ($request->input('oblastStrucnost')) {
            $oblast = $request->input('oblastStrucnost');


            $naslov = $request->input('naslov');
            $text = $request->input('obavestenje');

            //Izvlaci sve mejlove recenzneata koji pripadaju odredjenoj oblasti strucnosti
            $recenznentiMail = DB::table('oblast_strucnosti as o')
                ->join('recenzenti as r', 'o.id', '=', 'r.oblastStrucnosti_id')
                ->join('users as u', 'r.user_id', 'u.id')
                ->where('o.id', '=', $oblast)
                ->get('email');

            foreach ($recenznentiMail as $r) {
                $Mail = new PHPMailer\PHPMailer(); // create a n
                $Mail->SMTPDebug = false;
                $Mail->Mailer = 'smtp';
                $Mail->isSMTP();
                $Mail->Host = "smtp.gmail.com";
                $Mail->Port = 587;
                $Mail->SMTPSecure = "tls";
                $Mail->SMTPAuth = true;
                $Mail->Username="veljkoveljkovic.mdi@gmail.com";
                $Mail->Password="sajbervelja";
                $Mail->SetFrom("veljkoveljkovic.mdi@gmail.com");
                $Mail->Subject = $naslov;
                $Mail->Body = $text;
                $Mail->AddAddress($r->email);
                if (!$Mail->Send()) {


                    return 'Obaveštenje nije uspešno poslato';
                }
            }
            return 'Obaveštenje uspešno poslato na mail';
            }
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
    public function destroy($id)
    {
        //
    }
}
