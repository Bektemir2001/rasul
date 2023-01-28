<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;



class IndexController extends Controller
{
    public function __invoke(){
        $teachers = Teacher::all();

        return view('admin.teacher.index', compact('teachers'));
    }
}
