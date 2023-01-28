<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Type;
use DataTables;

class IndexController extends Controller
{
    public function __invoke(){
        $students = Student::where('gender', auth()->user()->gender)->get();
        return view('admin.student.index', compact('students'));
    }
}
