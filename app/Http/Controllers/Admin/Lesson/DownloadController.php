<?php

namespace App\Http\Controllers\Admin\Lesson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Semester;
use App\Models\LessonFile;

class DownloadController extends Controller
{
    public function __invoke(LessonFile $lessonfile){
        $file = public_path('storage/'.$lessonfile->file);
        return response()->download($file);
    }
}
