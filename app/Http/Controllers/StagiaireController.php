<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StagiaireRequest;

class StagiaireController extends Controller
{
    public function store(StagiaireRequest $request){

        $user = new User();

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->numtel = $request->numtel;
        $user->grade = "admin";
        $user->date_naissance = $request->date_naissance;

        if($request->hasFile('photo')){
            $user->photo = $request->photo->store('images');
        }

        

        $user->save();

        $stagiaire = new Stagiaire();

        $stagiaire->niveau = $request->niveau;
        $stagiaire->user_id = $user->id;
        $stagiaire->diplome_id = $request->diplome_id;
        $stagiaire->classe_id = $request->classe_id;

        $stagiaire->save();




        return redirect()->back()->with('signed', 'Votre compte a été créé avec succés');
    }
}
