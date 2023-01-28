<?php

namespace App\Http\Controllers\Admin\Semester;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;

class FilterController extends Controller
{
    public function __invoke(Request $request){
        $filter = $request->filter;
        $semesters = Semester::where('gender', $filter)->get();
        return response()->json($semesters);
    }
}
