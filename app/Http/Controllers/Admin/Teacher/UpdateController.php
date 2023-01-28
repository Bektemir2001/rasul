<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Teacher\UpdateRequest;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Teacher $teacher){
        $data = $request->validated();
        if(array_key_exists('image', $data)){
            if($teacher->image !== 'https://avatars.mds.yandex.net/i?id=1ec55abea3024c706388edcd1184f2ee-5916170-images-thumbs&n=13'){
                Storage::disck('public')->delete($teacher->image);
                $data['image'] = Storage::disk('public')->put('teachers', $data['image']);
                $data['image'] = 'storage/'.$data['image'];
            }
            else{
                $data['image'] = Storage::disk('public')->put('teachers', $data['image']);
                $data['image'] = 'storage/'.$data['image'];
            }
        }
        $teacher->update($data);
        $notification = "Изменено";
        return redirect()->route('teacher.index')->with(['notification' => $notification]);
    }
}
