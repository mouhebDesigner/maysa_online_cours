<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    public function stagiaire(){
        return $this->belongsTo(Stagiaire::class);
    }

    public function matiere(){
        return $this->belongsTo(Matiere::class);
    }
}
