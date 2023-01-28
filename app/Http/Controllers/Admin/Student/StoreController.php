<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Student\StoreRequest;
use App\Models\User;
use App\Models\Type;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender']
        ]);
        if(array_key_exists('image', $data)){
            $data['image'] = Storage::disk('public')->put('users', $data['image']);
            $data['image'] = 'storage/'.$data['image'];
        }
        else{
            $data['image'] = 'https://avatars.mds.yandex.net/i?id=1ec55abea3024c706388edcd1184f2ee-5916170-images-thumbs&n=13';
        }
        Student::create([
            'user_id' => $user->id,
            'type_id' => $data['type'],
            'address' => $data['address'],
            'age' => $data['age'],
            'content' => $data['content'],
            'image' => $data['image'],
        ]);
        $notification = "Сохранено";
        return redirect()->route('student.index')->with(['notification' => $notification]);
    }
}
