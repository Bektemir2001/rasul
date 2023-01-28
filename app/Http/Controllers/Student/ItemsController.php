<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;

class ItemsController extends Controller
{
    public function __invoke(){
        $l = Lesson::where('gender', auth()->user()->gender)->get();
        $lessons = [];
        foreach($l as $le){
        	if($le->semester->type_id == auth()->user()->student[0]->type_id){
        		array_push($lessons, $le);
        	}
        }
        $i = 0;
        $count = count($lessons);
        return view('student.items', compact('lessons', 'i', 'count'));
    }
}
