<?php

namespace App\Http\Controllers\Admin\Lesson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Semester;
use App\Models\Type;

class IndexController extends Controller
{
    public function __invoke(){
        $lessons = Lesson::where('gender', auth()->user()->gender)->get();
        $semesters = Semester::where('gender', auth()->user()->gender)->get();
        $types = Type::all();        
        return view('admin.lesson.index', compact('lessons', 'semesters', 'types'));
    }
}
