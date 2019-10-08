<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OblastStrucnosti extends Model
{
    protected $guarded = [];
    // Table Name
    protected $table = 'oblast_strucnosti';
    // Primary Key
    public $primaryKey = 'id';

    public function oblasti()
    {
        return $this->hasMany('App\Recenzent', 'oblastStrucnosti_id', 'id');
    }


    }

