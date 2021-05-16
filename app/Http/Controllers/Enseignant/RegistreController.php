<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Seance;
use App\Models\Matiere;
use App\Models\Registre;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class RegistreController extends Controller
{
    public function index($seance_id){

        $matiere_id = Seance::find($seance_id)->matiere_id;
        $niveau_matiere = Matiere::find($matiere_id)->niveau;
        $diplome_matiere = Matiere::find($matiere_id)->diplome_id;
        $stagiaires = Stagiaire::with('user')->where('niveau', $niveau_matiere)->where('diplome_id', $diplome_matiere)->get();

        return view('enseignant.abscences.index', compact('stagiaires', 'seance_id'));
    }

    public function absence($stagiaire_id, $seance_id){
        
        $registre = new Registre();

        $registre->seance_id = $seance_id;
        $registre->formateur_id = Auth::user()->formateur->id;
        $registre->stagiaire_id = $stagiaire_id;

        $registre->save();

        $name = Stagiaire::find($stagiaire_id)->user->nom;

        return redirect()->back()->with('success', $name.' a été enregistré comme absent');
    }
}
