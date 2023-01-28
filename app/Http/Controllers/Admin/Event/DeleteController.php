<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class DeleteController extends Controller
{
    public function __invoke(Event $event){
        $event->delete();
        $notification = 'Удалено';
        return redirect()->route('event.index')->with(['notification' => $notification]);
    }
}
