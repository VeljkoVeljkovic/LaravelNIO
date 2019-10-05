<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjekatRecenzent extends Pivot
{
   protected $guarded = [];
    // Table Name
    //protected $filable = ['id', 'p_idProjekat', 'r_idRecenzent'];
    protected $table = 'projekat_recenzent';
    // Primary Key
    public $primaryKey = 'id';
    // Posto nema timestamps u tabeli mora da se navede da ne bi javljao sistem gresku prilikom update
    public $timestamps = false;
    public function ocenaProjekatRecenzent()
    {
        return $this->hasMany('App\Ocene', 'projekatRecenzent_id', 'id');
    }

    public function projekat()
    {
        return $this->belongsTo('App\Projekat', 'p_idProjekat', 'idProjekat');
    }

    public function recenzentR()
    {
        return $this->belongsTo('App\Recenzent', 'r_idRecenzent', 'idRecenzent');
    }

}
