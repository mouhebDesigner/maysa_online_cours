<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
  


    public function index(){
        $events = Event::paginate(10);

        return view('events.index', compact('events'));
    }
    
    public function show($id){
        $event = Event::find($id);
        return view('events.show', compact('event'));
    }
}
