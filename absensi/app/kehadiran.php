<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kehadiran extends Model
{
    protected $table = "kehadiran";

    public function user(){
        return $this->belongsTo('App\User');
    }

}
