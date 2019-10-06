<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anketa extends Model
{
  protected $guarded = [];
   // Table Name
   protected $table = 'anketa';
   // Primary Key
   public $primaryKey = 'idAnketa';

  public function pitanjaAnketa()
     {
        return $this->hasMany('App\AnketaPitanja', 'anketa_idAnketa', 'idAnketa');
     }



    public function recenzentiA()
    {
       // return $this->belongsToMany(Projekat::class);
        return $this->belongsToMany('App\Recenzent', 'anketa_recenzenti', 'a_idAnketa', 'r_idRecenzent');
    }
   }
