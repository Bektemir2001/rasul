<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function __invoke(){
        $events = Event::all()->sortDesc();
        return view('main.event', compact('events'));
    }
}
