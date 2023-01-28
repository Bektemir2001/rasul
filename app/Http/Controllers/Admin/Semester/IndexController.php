<?php

namespace App\Http\Controllers\Admin\Semester;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\Type;

class IndexController extends Controller
{
    public function __invoke(){
        $semesters = Semester::where('gender', auth()->user()->gender)->get();
        $types = Type::all();

        return view('admin.semester.index', compact('semesters', 'types'));
    }
}
