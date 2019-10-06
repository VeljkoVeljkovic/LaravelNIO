<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnketaOdgovori extends Model
{
  protected $guarded = [];
   // Table Name
   protected $table = 'anketa_odgovori';
   // Primary Key
   public $primaryKey = 'idOdgovor';


}
