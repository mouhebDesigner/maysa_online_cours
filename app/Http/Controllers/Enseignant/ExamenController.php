<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Examen;
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

        

        return view('enseignant.abscences.index', compact('stagiaires', 'seance_id'));
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

        return redirect('admin/examens')->with('added', 'L\'examen a été ajouté avec succés');
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

        return redirect('admin/examens')->with('updated', 'L\'examen a été modifié avec succés');
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
        return redirect('admin/examens')->with('deleted', 'L\'examen a été supprimer avec succés');
        
    }
}
