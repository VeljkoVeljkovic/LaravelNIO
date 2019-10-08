<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obavestenja extends Model
{
  protected $guarded = [];
  // Table Name
  protected $table = 'obavestenja';
  // Primary Key
  public $primaryKey = 'idObavestenja';

  public function poslataObavestenja()
  {
    return $this->belongsToMany('App\Recenzent', 'obavestenja_recenzent', 'o_idObavestenja', 'r_idRecenzent')->withPivot('idObavRec')->withTimestamps();
  }

}
