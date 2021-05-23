<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Module;
use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    public function index(){
        $matieres = Matiere::where('diplome_id', Auth::user()->stagiaire->diplome_id)->paginate(6);

        return view('matieres.index', compact('matieres'));
        
    }

    public function show($id){
        $matiere = Matiere::find($id);

        return view('pages.matieres.show', compact('matiere'));
    }
    
}
