<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Note;
use App\Models\Eleve;
use App\Models\Matiere;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use App\Http\Requests\NoteRequest;
use App\Http\Controllers\Controller;

class NoteController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($matiere_id){
        $notes = Note::where('matiere_id', $matiere_id)->paginate(10);

        return view('enseignant.notes.index', compact('notes', 'matiere_id'));
    }


   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($matiere_id)
    {
        $niveau = Matiere::find($matiere_id)->niveau;
        $stagiaires = Stagiaire::where('niveau', $niveau)->get();
        return view('enseignant.notes.create', compact('matiere_id', 'stagiaires'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request, $matiere_id)
    {
        $note = new Note();

        $note->note = $request->note;   
        $note->matiere_id = $matiere_id;   
        $note->stagiaire_id = $request->stagiaire_id;   
    
        $note->save();
    
        
        return redirect('enseignant/matiere/'.$matiere_id.'/notes')->with('added', 'La note a été ajouté avec succés');
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
    public function edit($id, $matiere_id)
    {
        $niveau = Matiere::find($matiere_id)->niveau;
        $stagiaires = Stagiaire::where('niveau', $niveau)->get();
        $note = Note::find($id);

        return view('enseignant.notes.edit', compact('note', 'stagiaires', 'niveau'));
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
        $note = Note::find($id);


        $note->note = $request->note;    
        $note->stagiaire_id = $request->stagiaire_id;   
    
        $note->save();
    

        return redirect('enseignant/matiere/'.$note->matiere_id.'/notes')->with('updated', 'La notes a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matiere_id = Note::find($id)->matiere_id;
        Note::find($id)->delete();

        return redirect('enseignant/matiere/'.$matiere_id.'/notes')->with('deleted', 'La notes a été supprimer avec succés');
    }
}
