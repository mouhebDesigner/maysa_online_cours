<?php

namespace App\Http\Controllers\Admin;

use App\Models\Diplome;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DiplomeRequest;

class DiplomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diplomes = Diplome::paginate(10);

        return view('admin.diplomes.index', compact('diplomes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.diplomes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiplomeRequest $request)
    {
        $diplome = new Diplome();

        $diplome->titre = $request->titre;
        $diplome->image = $request->image->store('images');

        $diplome->save();

        return redirect('admin/diplomes')->with('added', 'Le diplôme a été ajouté avec succés');
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
        $diplome = Diplome::find($id);

        return view('admin.diplomes.edit', compact('diplome'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiplomeRequest $request, $id)
    {
        $diplome =  Diplome::find($id);

        $diplome->titre = $request->titre;
        $diplome->image = $request->image->store('images');

        $diplome->save();

        return redirect('admin/diplomes')->with('updated', 'Le diplôme a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Diplome::find($id)->delete();
        return redirect('admin/diplomes')->with('deleted', 'Le diplôme a été supprimer avec succés');
        
    }
}
