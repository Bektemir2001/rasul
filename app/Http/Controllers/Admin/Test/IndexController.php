<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Type;
use App\Models\Lesson;
use App\Models\Semester;

class IndexController extends Controller
{
    public function __invoke(){
    	$types = Type::all();
        $tests = Test::all();
        $semesters = Semester::where('gender', auth()->user()->gender)->get();
        $lessons = Lesson::where('gender', auth()->user()->gender)->get();
        return view('admin.test.index', compact('tests', 'semesters', 'lessons', 'types'));
    }
}
