<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    public function codes(){
        return $this->hasMany('App\Models\Code');
    }

    public function participations(){
        return $this->hasMany('App\Models\Participation');
    }
}
