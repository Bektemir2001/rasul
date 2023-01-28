<?php

namespace App\Http\Controllers\Admin\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Moderator\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        $data = $request->validated();
        if(array_key_exists('image', $data)){
            $data['image'] = Storage::disk('public')->put('users', $data['image']);
            $data['image'] = 'storage/'.$data['image'];
        }
        $data['role'] = 'moderator';
        $data['password'] = Hash::make($data['password']);
        // dd($data);
        User::create($data);
        $notification = 'Сохранено';
        return redirect()->route('moderator.index')->with(['notification' => $notification]);
    }
}
