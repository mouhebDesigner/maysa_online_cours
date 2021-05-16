<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registre extends Model
{
    use HasFactory;

    public function seances(){
        return $this->hasMany(Seance::class);
    }
    
    public function stagiaires(){
        return $this->hasMany(Stagiaire::class);
    }
    public function formateurs(){
        return $this->hasMany(Formateur::class);
    }

}
