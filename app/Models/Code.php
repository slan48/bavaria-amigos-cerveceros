<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function award(){
        return $this->belongsTo('App\Models\Award');
    }

    public function participation(){
        return $this->hasOne('App\Models\Participation');
    }
}
