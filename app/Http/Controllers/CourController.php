<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourController extends Controller
{

    public function __construct(){
        return $this->middleware('auth');
    }


    public function show($id){
        $cour = Cour::find($id);

        return view('cours.show', compact('cour'));
    }

}
