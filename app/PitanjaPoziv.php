<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PitanjaPoziv extends Model
{
	 protected $guarded = [];
     // Table Name
  protected $table = 'pitanja_pozivi';
  // Primary Key
  public $primaryKey = 'idPitanja';

  public function poziv()
    {
        return $this->belongsTo('App\Poziv', 'pozivi_idPoziv', 'idPoziv');
    }
}

 
