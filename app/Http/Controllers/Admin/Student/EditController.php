<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Type;

class EditController extends Controller
{
    public function __invoke(Student $student){
        $types = Type::all();
        return view('admin.student.edit', compact('student', 'types'));
    }
}
