<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Teacher;

class TeacherController extends Controller
{
    public function __invoke(){
        $teachers = Teacher::all();
        return view('main.teacher', compact('teachers'));
    }
}
