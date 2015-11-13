<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    public function answer() {
        return $this->hasMany('\App\Answer');
    }

    public function quiz() {
        return $this->belongsTo('\App\Quiz');
    }
    
}
