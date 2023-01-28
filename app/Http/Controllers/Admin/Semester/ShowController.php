<?php

namespace App\Http\Controllers\Admin\Semester;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;

class ShowController extends Controller
{
    public function __invoke(Semester $semester){
        return view('admin.semester.show', compact('semester'));
    }
}
