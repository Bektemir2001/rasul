<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;

class ItemDetailsController extends Controller
{
    public function __invoke(Lesson $lesson){
        $lesson_files = $lesson->files;
        return view('student.item_details', compact('lesson', 'lesson_files'));
    }
}
