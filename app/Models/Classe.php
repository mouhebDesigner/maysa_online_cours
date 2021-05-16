<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;


    public function diplome(){
        return $this->belongsTo(Diplome::class);
    }

    public function seances(){
        return $this->hasMany(Seance::class);
    }
}
