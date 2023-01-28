<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class IndexController extends Controller
{
    public function __invoke(){
        $events = Event::all();
        return view('admin.event.index', compact('events'));
    }
}
