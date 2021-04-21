<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Formateur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\FormateurRequest;
use App\Http\Requests\FormateurEditRequest;

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formateurs = User::where('grade', 'formateur')->paginate(10);

        return view('admin.formateurs.index', compact('formateurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.formateurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormateurRequest $request)
    {
        $user = new User();

        $formateur = new Formateur();

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->grade = "formateur";
        $user->numtel = $request->numtel;
        $user->date_naissance = $request->date_naissance;
        if($request->hasFile('photo')){
            $user->photo = $request->photo->store('images');
        }

        $user->save();

        $formateur->specialite = $request->specialite;

        $formateur->user_id = $user->id;

        $formateur->save();


        return redirect('admin/formateurs')->with('added', 'Le formateur a été ajouté avec succés');
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
        $formateur = User::find($id);

        return view('admin.formateurs.edit', compact('formateur'));
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
            'specialite' => 'required'
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

        $formateur_id = Formateur::where('user_id', $id)->first()->id;
        $formateur =  Formateur::find($formateur_id);

        $formateur->specialite = $request->specialite;

        $formateur->save();

        if($request->hasFile('image')){
            $event->image = $request->image->store('images');
        }
        $formateur->save();

        return redirect('admin/formateurs')->with('updated', 'Le formateur a été modifié avec succés');
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

        return redirect('admin/formateurs')->with('deleted', 'Le formateur a été supprimer avec succés');
        
    }
}
