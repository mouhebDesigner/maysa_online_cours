<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Formateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\FormateurRequest;

class FormateurController extends Controller
{
    public function store(FormateurRequest $request){
        

        $user = new User();

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->numtel = $request->numtel;
        $user->grade = "formateur";
        $user->date_naissance = $request->date_naissance;

        if($request->hasFile('photo')){
            $user->photo = $request->photo->store('images');
        }
        $user->save();

        $formateur = new Formateur();

        $formateur->user_id = $user->id;
        $formateur->specialite = $request->specialite;

        $formateur->save();
        
        return redirect()->back()->with('signed', 'Votre compte a été créé avec succés');
    }
}
