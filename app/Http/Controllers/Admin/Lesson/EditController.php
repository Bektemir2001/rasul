<?php

namespace App\Http\Controllers\Admin\Lesson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Semester;

class EditController extends Controller
{
    public function __invoke(Lesson $lesson){
        $semesters = Semester::all();
        return view('admin.lesson.edit', compact('lesson', 'semesters'));
    }
}
