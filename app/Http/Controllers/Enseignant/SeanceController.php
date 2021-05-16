<?php

namespace App\Http\Controllers\Enseignant;

use Auth;
use App\Models\Seance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeanceController extends Controller
{
    public function index()
    {
        $seances = Seance::where('formateur_id', Auth::user()->formateur->id)->paginate(10);

        return view('enseignant.seances.index', compact('seances'));
    }
}
