<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cour;
use App\Http\Requests\CourRequest;
class CourController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cours = Cour::paginate(10);

        return view('admin.cours.index', compact('cours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cours.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourRequest $request)
    {
        $cour = new Cour();

        $cour->title = $request->title;
        $cour->description = $request->description;
        $cour->prix = $request->prix;
        $cour->formateur_id = $request->formateur_id;

        if($request->hasFile('image')){
            $cour->image = $request->image->store('images');
        }
        $cour->save();

        return redirect('admin/cours')->with('added', 'Le cour a été ajouté avec succés');
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
        $cour = Cour::find($id);

        return view('admin.cours.edit', compact('cour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourRequest $request, $id)
    {
        $cour =  Cour::find($id);

        $cour->title = $request->title;
        $cour->description = $request->description;
        $cour->prix = $request->prix;
        $cour->formateur_id = $request->formateur_id;
        if($request->hasFile('image')){
            $cour->image = $request->iamge->store('images');
        }
        $cour->save();

        return redirect('admin/cours')->with('updated', 'Le cour a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cour::find($id)->delete();
        return redirect('admin/cours')->with('deleted', 'Le cour a été supprimer avec succés');
        
    }
}
