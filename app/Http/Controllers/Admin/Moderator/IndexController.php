<?php

namespace App\Http\Controllers\Admin\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke(){
        $moderators = User::where('role', 'moderator')->get();
        return view('admin.moderator.index', compact('moderators'));
    }
}
