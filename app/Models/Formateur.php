<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cours(){
        return $this->hasMany(Cour::class);
    }

    public function matieres(){
        return $this->hasMany(Matiere::class);
    }

    public function seances(){
        return $this->hasMany(Seance::class);
    }
}
