<?php

namespace App\Http\Controllers\Admin\Lesson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;

class DeleteController extends Controller
{
    public function __invoke(Lesson $lesson){
        $files = $lesson->files;
        foreach($files as $file){
            $file->delete();
        }
        $lesson->delete();
        $notification = 'Удалено';
        return redirect()->route('lesson.index')->with(['notification' => $notification]);
    }
}
