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
}
