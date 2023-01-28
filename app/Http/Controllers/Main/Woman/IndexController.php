<?php

namespace App\Http\Controllers\Main\Woman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class IndexController extends Controller
{
    public function __invoke(){
        $types = Type::all();
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
        return view('main.woman.index', compact('types', 'set_button'));
    }
}
