<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Event;
use App\Models\Lesson;

class IndexController extends Controller
{
    public function __invoke(Request $request){
        if(session('auth_user') === 'auth'){
            if(auth()->user()){
                if(auth()->user()->role == 'admin'){
                    session()->forget('auth_user');
                    return redirect()->route('admin.index');
                }
            }

        }
        $types = Type::all();

        $set_button = 0;
        if(auth()->user()){
            $applications = auth()->user()->application;
            $set_button = 1;
            if(count($applications) == 0){
                $set_button = 1;
            }
            else{
                foreach($applications as $application){
                    if($application->status == 0 || $application->status == 2){
                        $set_button = 0;
                        break;
                    }
                }
            }
        }

        $events = Event::all()->sortDesc()->take(3);
        return view('main.index', compact('events', 'set_button', 'types'));
    }
}
