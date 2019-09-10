<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Recenzent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/pozivi';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
      dd("Proba");
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'ime' => ['required', 'string', 'max:255'],
            'prezime' => ['required', 'string', 'max:255'],
            'korime' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nacionalnost' => ['required', 'string', 'max:255'],
            'zemlja' => ['required', 'string', 'max:255'],
            'NIO' => ['required', 'string', 'max:255'],
            'trenutnaFirma' => ['required', 'string', 'max:255'],
            'naucnoZvanje' => ['required', 'string', 'max:255'],
            'angazovanje' => ['required', 'string', 'max:255'],
            'oblastiStrucnosti' => ['required'],
            'telefon' => array('required', 'regex:/^0[0-9]{7,9}$/'),
            'adresa' => ['required', 'string', 'max:255'],
            'dokument' => ['required', 'mimes:pdf'],
            'vebStranica' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

//    public function validate_number($number) {
//        return (bool)preg_match('/^0[0-9]{7,9}$/', $number);
//    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

         User::create([
            'name' => $data['korime'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);






// Izvlaci poslednji red iz tabele users kako bi dobili vrednost za spoljni kljuc u tabeli recenznet  user_id
        $poslednjiUser = User::orderBy('created_at', 'desc')->first();


//    Ubacuje podatke u tabelu recenzenti
        $recenzent = new Recenzent;
        $recenzent->ime = $data['ime'];
        $recenzent->prezime = $data['prezime'];
        $recenzent->nacionalnost = $data['nacionalnost'];
        $recenzent->zemlja = $data['zemlja'];
        $recenzent->NIO = $data['NIO'];
        $recenzent->trenutnaFirma = $data['trenutnaFirma'];
        $recenzent->naucnoZvanje = $data['naucnoZvanje'];
        $recenzent->angazovanje = $data['angazovanje'];
        $recenzent->telefon = $data['telefon'];
        $recenzent->adresa = $data['adresa'];
        $recenzent->vebStranica = $data['vebStranica'];
        $recenzent->user_id = $poslednjiUser->id;
        $recenzent->oblastStrucnosti_id = $data['oblastiStrucnosti'];
        $recenzent->rola = 'recenzent';
        $recenzent-> save();

        $file = $data['dokument'];
        $nazivDirektorijuma = $data['korime'];
        if(!is_dir(public_path('/recenzenti/'.$nazivDirektorijuma)))
            mkdir(public_path('/recenzenti/'.$nazivDirektorijuma), 0777, TRUE);
        $uniqueFileName = $file->getClientOriginalName();
        $file->move(public_path('/recenzenti/'.$nazivDirektorijuma), $uniqueFileName);

        return  $poslednjiUser = User::orderBy('created_at', 'desc')->first();

    }
}
