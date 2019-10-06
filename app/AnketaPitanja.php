<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnketaPitanja extends Model
{
  protected $guarded = [];
   // Table Name
   protected $table = 'anketa_pitanja';
   // Primary Key
   public $primaryKey = 'idPitanja';

   public function anketa()
   {
     return $this->belongsTo('App\Anketa', 'anketa_idAnketa', 'idAnketa');
   }
}
