<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Teacher\StoreRequest;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        $data = $request->validated();
        if(array_key_exists('image', $data)){
            $data['image'] = Storage::disk('public')->put('teachers', $data['image']);
            $data['image'] = 'storage/'.$data['image'];
        }
        else{
            $data['image'] = 'https://avatars.mds.yandex.net/i?id=1ec55abea3024c706388edcd1184f2ee-5916170-images-thumbs&n=13';
        }
        Teacher::create($data);
        $notification = "Сохранено";
        return redirect()->route('teacher.index')->with(['notification' => $notification]);
    }
}
