<?php

namespace App\Http\Controllers\Admin\Lesson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;

class FilterSemesterController extends Controller
{
    public function __invoke(Request $request){
        $semesters = Semester::where('type_id', $request->filter)
        ->where('gender', auth()->user()->gender)
        ->get();
        return response($semesters);
    }
}
