<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function presence_list($id){
        $event = Event::findOrFail($id);
        return view('presence_list', compact('event'));
    }

}
