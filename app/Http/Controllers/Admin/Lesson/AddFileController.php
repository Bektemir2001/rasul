<?php

namespace App\Http\Controllers\Admin\Lesson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;
use App\Models\LessonFile;

class AddFileController extends Controller
{
    public function __invoke(Request $request, Lesson $lesson){
        $files = $request->validate([
            'files.*' => 'mimes:pdf,doc,docx',
        ]);
        foreach($files['files'] as $file){
            LessonFile::create([
                'lesson_id' => $lesson->id,
                'name' => $file->getClientOriginalName(),
                'file' => Storage::disk('public')->put('lesson_files', $file)
            ]);
        }
        return back();
    }
}
