<?php

namespace App\Http\Controllers\Admin\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Moderator\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(User $moderator, UpdateRequest $request){
        $data = $request->validated();
        if(array_key_exists('image', $data)){
            $data['image'] = Storage::disk('public')->put('users', $data['image']);
            $data['image'] = 'storage/'.$data['image'];
        }
        $moderator->update($data);
        $notification = 'Изменено';
        return redirect()->route('moderator.index')->with(['notification' => $notification]);
    }
}
