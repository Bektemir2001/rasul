<?php

namespace App\Http\Controllers\Admin\Lesson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;
use App\Models\LessonFile;

class FilterController extends Controller
{
    public function __invoke(Request $request){
        $lessons = Lesson::where('id', $request->filter)->get();
        return response()->json($lessons);
    }
}
