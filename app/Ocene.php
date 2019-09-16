<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocene extends Model
{
    protected $guarded = [];
    // Table Name
    protected $table = 'ocene';
    // Primary Key
    public $primaryKey = 'idOcene';

    public function pitanjeOcena()
    {
        return $this->belongsTo('App\PitanjaPoziv', 'pitanjaPoziv_idPitanja', 'idPitanja');
    }

    public function ProjekatRecenzent()
    {
        return $this->belongsTo('App\ProjekatRecenzent', 'projekatRecenzent_id', 'id');
    }

}
