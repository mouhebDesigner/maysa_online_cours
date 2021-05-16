<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diplome extends Model
{
    use HasFactory;

    public function matieres(){
        return $this->hasMany(Matiere::class);
    }
    public function classes(){
        return $this->hasMany(Classe::class);
    }
   
}
