<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjekatRecenzent extends Pivot
{
    protected $guarded = [];
    // Table Name
    protected $table = 'projekat_recenzent';
    // Primary Key
    public $primaryKey = 'id';

    public function ocenaProjekatRecenzent()
    {
        return $this->hasMany('App\Ocene', 'projekatRecenzent_id', 'id');
    }

    public function projekat()
    {
        return $this->belongsTo('App\Projekat', 'p_idProjekat', 'idProjekat');
    }

}
