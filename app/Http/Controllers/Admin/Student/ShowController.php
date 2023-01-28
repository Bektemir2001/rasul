<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class ShowController extends Controller
{
    public function __invoke(Student $student){
        return view('admin.student.show', compact('student'));
    }
}
