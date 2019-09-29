<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Projekat extends Model
{
     protected $guarded = [];
     // Table Name
  protected $table = 'projekat';
  // Primary Key
  public $primaryKey = 'idProjekat';

  public function pozivProjekat()
    {
        return $this->belongsTo('App\Poziv', 'pozivi_idPoziv', 'idPoziv');
    }

    /**
     *
     */
    public function recenzents()
    {
      //  return $this->belongsToMany(Recenzent::class);
        return $this->belongsToMany('App\Projekat', 'projekat_recenzent', 'p_idProjekat', 'r_idRecenzent');
    }

    public function projekatRadi()
    {
        return $this->hasMany('App\ProjekatRecenzent', 'p_idProjekat', 'idProjekat');
    }
}
