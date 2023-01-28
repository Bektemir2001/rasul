<?php

namespace App\Http\Controllers\Admin\Lesson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;
use App\Models\LessonFile;
use App\Models\Semester;
use App\Http\Requests\Admin\Lesson\StoreRequest;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        $data = $request->validated();
        // dd($data['files'][0]->getClientOriginalName() );
        $data = $request->validated();
        $semester = Semester::where('id', $data['semester_id'
    ])->get();
        $data['gender'] = $semester[0]->gender;
        if(array_key_exists('image', $data)){
            $data['image'] = Storage::disk('public')->put('lessons', $data['image']);
            $data['image'] = 'storage/'.$data['image'];
        }
        else{
            $data['image'] = 'storage/lessons/pwCzNv0pAH1tN1kCyTgsnafUiP9X6k6Zzcl2LO5K.jpg';
        }
        if(array_key_exists('files', $data)){
            $files = $data['files'];
            unset($data['files']);
            $lesson = Lesson::create($data);
            foreach($files as $file){
                LessonFile::create([
                    'lesson_id' => $lesson->id,
                    'name' => $file->getClientOriginalName(),
                    'file' => Storage::disk('public')->put('lesson_files', $file)
                ]);
            }
        }
        else{
            Lesson::create($data);
        }

        $notification = 'Сохранено';
        return back()->with(['notification' => $notification]);
    }
}
