<?php

namespace App\Http\Controllers\Admin\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(User $moderator){
        return view('admin.moderator.edit', compact('moderator'));
    }
}
