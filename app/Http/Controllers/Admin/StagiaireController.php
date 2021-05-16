<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Formateur;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StagiaireRequest;
use App\Http\Requests\StagiaireEditRequest;

class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stagiaires = User::where('grade', 'stagiaire')->paginate(10);

        return view('admin.stagiaires.index', compact('stagiaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stagiaires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StagiaireRequest $request)
    {
        $user = new User();

        $stagiaire = new Stagiaire();

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->grade = "stagiaire";
        $user->numtel = $request->numtel;
        $user->date_naissance = $request->date_naissance;
        if($request->hasFile('photo')){
            $user->photo = $request->photo->store('images');
        }

        $user->save();

        $stagiaire->niveau = $request->niveau;
        $stagiaire->diplome_id = $request->diplome_id;
        $stagiaire->classe_id = $request->classe_id;
        $stagiaire->user_id = $user->id;

        $stagiaire->save();


        return redirect('admin/stagiaires')->with('added', 'Le stagiaire a été ajouté avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stagiaire = User::find($id);

        return view('admin.stagiaires.edit', compact('stagiaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validations_password = "";
        if($request->password != ""){
            $validations_password = "required | string | min:8 | confirmed";
        }
        
        $request->validate([
            'numtel' => "required | numeric | digits:8 | unique:users,numtel,".$id.",id",
            "password" => $validations_password,
            "email" =>  "required | string | email | max:255 | unique:users,email,".$id.",id",
            'nom' => 'required | string | max:255',
            'prenom' => 'required | string | max:255',
            'date_naissance' => 'required',
            'niveau' => 'required',
            'type_formation' => 'required',
            'diplome_id' => 'required',
        ]);
            
        $user =  User::find($id);
      

       

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        if(isset($request->password))
            $user->password = Hash::make($request->password);
        $user->numtel = $request->numtel;
        $user->date_naissance = $request->date_naissance;

        $user->save();

        $stagiaire_id = Stagiaire::where('user_id', $id)->first()->id;
        $stagiaire =  Stagiaire::find($stagiaire_id);

        $stagiaire->niveau = $request->niveau;
        $stagiaire->diplome_id = $request->diplome_id;

        $stagiaire->save();

        if($request->hasFile('image')){
            $event->image = $request->image->store('images');
        }
        $stagiaire->save();

        return redirect('admin/stagiaires')->with('updated', 'Le stagiaire a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect('admin/stagiaires')->with('deleted', 'Le stagiaire a été supprimer avec succés');
        
    }
}
