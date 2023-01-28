<?php

namespace App\Http\Controllers\Admin\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function __invoke(User $moderator){
        if($moderator->image){
            $image = str_replace('storage/', '', $moderator->image);
            Storage::disk('public')->delete($image);
        }
        $moderator->forceDelete();
        $notification = 'Удалено';
        return redirect()->route('moderator.index')->with(['notification' => $notification]);
    }
}
