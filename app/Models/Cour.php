<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;

    public function formateur(){
        return $this->belongsTo(Formateur::class);
    }
    public function videos(){
        return $this->hasMany(Video::class);
    }

    
}
