<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    public function diplome(){
        return $this->belongsTo(Diplome::class);
    }
    public function examen(){
        return $this->hasOne(Examen::class);
    }
    public function formateur(){
        return $this->belongsTo(Formateur::class);
    }
    public function seances(){
        return $this->hasMany(Seance::class);
    }


}
