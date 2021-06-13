<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\User;
use App\Models\Examen;
use App\Models\Matiere;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExamenRequest;

class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examens = Examen::paginate(10);

        return view('enseignant.examens.index', compact('examens'));
    }

    public function stagiaires($examen_id){

        $matiere_id = Examen::find($examen_id)->matiere_id;
        $diplome_id = Matiere::find($matiere_id)->diplome_id;


        $users = Stagiaire::where('diplome_id', $diplome_id)->get('user_id');

        $ids = [];

        foreach($users as $id){
            array_push($ids, $id->user_id);
        }

        $stagiaires = User::whereIn('id', $ids)->paginate(10);

        
        return view('admin.stagiaires.index', compact('stagiaires', 'examen_id'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enseignant.examens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamenRequest $request)
    {
        $examen = new Examen();

        $examen->temps = $request->temps;
        $examen->date = $request->date;
        $examen->matiere_id = $request->matiere_id;
        
        $examen->save();

        return redirect('enseignant/examens')->with('added', 'L\'examen a été ajouté avec succés');
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
        $examen = Examen::find($id);

        return view('enseignant.examens.edit', compact('examen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamenRequest $request, $id)
    {
        $examen =  Examen::find($id);

        $examen->temps = $request->temps;
        $examen->date = $request->date;
        $examen->matiere_id = $request->matiere_id;

        $examen->save();

        return redirect('enseignant/examens')->with('updated', 'L\'examen a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Examen::find($id)->delete();
        return redirect('enseignant/examens')->with('deleted', 'L\'examen a été supprimer avec succés');
        
    }
}
