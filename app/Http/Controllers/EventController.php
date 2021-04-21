<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }


    public function show($id){
        $event = Event::find($id);

        return view('events.show', compact('event'));
    }
}
