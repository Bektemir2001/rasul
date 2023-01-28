<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Student\UpdateRequest;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Student $student){
        $data = $request->validated();
        $user = $student->user;
        try{
            DB::beginTransaction();
            if(array_key_exists('image', $data)){
                if($student->image !== 'https://avatars.mds.yandex.net/i?id=1ec55abea3024c706388edcd1184f2ee-5916170-images-thumbs&n=13'){
                    Storage::disk('public')->delete($student->image);
                    $data['image'] = Storage::disk('public')->put('users', $data['image']);
                    $data['image'] = 'storage/'.$data['image'];
                }
                else{
                    $data['image'] = Storage::disk('public')->put('users', $data['image']);
                    $data['image'] = 'storage/'.$data['image'];
                }
            }
            else{
                $data['image'] = 'https://avatars.mds.yandex.net/i?id=1ec55abea3024c706388edcd1184f2ee-5916170-images-thumbs&n=13';
            }
            if(array_key_exists('email', $data)){
                $user->update([
                    'name' => $data['name'],
                    'surname' => $data['surname'],
                    'email' => $data['email'],
                    'address' => $data['address'],
                    'age' => $data['age'],
                    'content' => $data['content'],
                    'image' => $data['image'],
                ]);
            }
            else{
                $user->update([
                    'name' => $data['name'],
                    'surname' => $data['surname'],
                    'address' => $data['address'],
                    'age' => $data['age'],
                    'content' => $data['content'],
                    'image' => $data['image'],
                ]);
            }
            $student->update([
                'user_id' => $user->id,
                'type_id' => $data['type_id'],

            ]);
            DB::commit();

        }
        catch(\Exception $exeption){
            DB::rollBack();
            dd($exeption);
        }

        $notification = "Изменено";
        return redirect()->route('student.index')->with(['notification' => $notification]);
    }
}
