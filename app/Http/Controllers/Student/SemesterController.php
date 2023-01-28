<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;

class SemesterController extends Controller
{
    public function __invoke(){
        $student = auth()->user()->student;
        $semesters = Semester::where('gender', auth()->user()->gender)
        ->where('type_id', $student[0]->type_id)
        ->get();
        return view('student.semester', compact('semesters'));
    }
}
