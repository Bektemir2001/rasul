<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request){
        $data = $request->validated();
        // dd($data['gender']);
        unset($data['g-recaptcha-response']);
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => 'male',
            'image' => 'https://avatars.mds.yandex.net/i?id=1ec55abea3024c706388edcd1184f2ee-5916170-images-thumbs&n=13'
        ]);
        $notification = "auth";
        return back()->with(['notification' => $notification]);

    }
}
