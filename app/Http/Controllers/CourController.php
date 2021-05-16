<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use Illuminate\Http\Request;

class CourController extends Controller
{

    public function __construct(){
        return $this->middleware('auth');
    }
    public function index(){
        $cours = Cour::paginate(10);

        return view('cours.index', compact('cours'));
    }
    
    public function show($id){
        $cour = Cour::find($id);
        return view('cours.show', compact('cour'));
    }

}
