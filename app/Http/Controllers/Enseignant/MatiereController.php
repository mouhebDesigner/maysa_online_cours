<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class MatiereController extends Controller
{
    public function index()
    {
        $matieres = Matiere::where('formateur_id', Auth::user()->formateur->id)->paginate(10);

        return view('enseignant.matieres.index', compact('matieres'));
    }
}
