<?php

namespace App\Http\Controllers\Admin\Lesson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(Request $request, Lesson $lesson){
        $data = $request->validate([
            'name' => 'required|string',
            'semester_id' => 'required|integer',
            'image' => 'mimes:jpg, jpeg, png, bnp'
        ]);

        if(array_key_exists('image', $data)){
            if($lesson->image !== 'storage/lessons/pwCzNv0pAH1tN1kCyTgsnafUiP9X6k6Zzcl2LO5K.jpg'){
                Storage::disk('public')->delete($lesson->image);
                $data['image'] = Storage::disk('public')->put('lessons', $data['image']);
                $data['image'] = 'storage/'.$data['image'];
            }
            else{
                $data['image'] = Storage::disk('public')->put('lessons', $data['image']);
                $data['image'] = 'storage/'.$data['image'];
            }
        }

        $lesson->update($data);
        $notification = 'Изменено';
        return redirect()->route('lesson.index')->with(['notification' => $notification]);
    }
}
