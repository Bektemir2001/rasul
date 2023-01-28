<?php

namespace App\Http\Controllers\Admin\Lesson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;

class ShowController extends Controller
{
    public function __invoke(Lesson $lesson){
        return view('admin.lesson.show', compact('lesson'));
    }
}
