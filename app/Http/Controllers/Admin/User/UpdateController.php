<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UpdateController extends Controller
{
    public function __invoke(UpdateUserRequest $request, User $user){
        $data = $request->validated();
        if(array_key_exists('image', $data)){
            $data['image'] = Storage::disk('public')->put('users', $data['image']);
            $data['image'] = 'storage/'.$data['image'];
        }
        $user->update($data);
        $notification = "Сохранено";
        return redirect()->route('user.index')->with(['notification' => $notification]);
    }
}
