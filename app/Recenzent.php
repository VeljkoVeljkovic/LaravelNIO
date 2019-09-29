<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recenzent extends Model
{
    protected $guarded = [];
    // Table Name
    protected $table = 'recenzenti';
    // Primary Key
    public $primaryKey = 'idRecenzent';

    public function useri()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function oblastiStrucnosti()
    {
        return $this->belongsTo('App\OblastStrucnosti', 'oblastStrucnosti_id', 'id');
    }

    /**
     *
     */
    public function projekats()
    {
       // return $this->belongsToMany(Projekat::class);
        return $this->belongsToMany('App\Projekat', 'projekat_recenzent', 'r_idRecenzent', 'p_idProjekat')->withPivot('rokZaIzvestaj');;
    }
}
