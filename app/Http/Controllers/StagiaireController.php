<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StagiaireRequest;

class StagiaireController extends Controller
{
    public function store(StagiaireRequest $request){

        $stagiaire = new User();

        $stagiaire->nom = $request->nom;
        $stagiaire->prenom = $request->prenom;
        $stagiaire->email = $request->email;
        $stagiaire->password = Hash::make($request->password);
        $stagiaire->numtel = $request->numtel;
        $stagiaire->grade = "stagiaire";
        $stagiaire->date_naissance = $request->date_naissance;

        $stagiaire->save();


        return redirect()->back()->with('signed', 'Votre compte a été créé avec succés');
    }
}
