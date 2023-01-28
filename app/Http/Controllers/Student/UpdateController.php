<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\TestResult;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateUserRequest $request, User $user){
        $data = $request->validated();
        if(array_key_exists('image', $data)){
            $data['image'] = Storage::disk('public')->put('users', $data['image']);
            $data['image'] = 'storage/'.$data['image'];
        }
        $user->update($data);
        $notification = "Изменено";
        return back()->with(['notification' => $notification]);
    }
}
