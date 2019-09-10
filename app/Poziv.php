<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poziv extends Model
{
 protected $guarded = [];
  // Table Name
  protected $table = 'pozivi';
  // Primary Key
  public $primaryKey = 'idPoziv';

 public function pitanja()
    {
       return $this->hasMany('App\PitanjaPoziv', 'pozivi_idPoziv', 'idPoziv');
    }

     public function projekat()
    {
       return $this->hasMany('App\Projekat', 'pozivi_idPoziv', 'idPoziv');
    }
  }



