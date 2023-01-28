<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;

class ShowController extends Controller
{
    public function __invoke(Teacher $teacher){
        return view('admin.teacher.show', compact('teacher'));
    }
}
