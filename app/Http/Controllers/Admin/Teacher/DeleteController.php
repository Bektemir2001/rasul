<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;

class DeleteController extends Controller
{
    public function __invoke(Teacher $teacher){
        $teacher->delete();
        $notification = "Удалено";
        return redirect()->route('teacher.index')->with(['notification' => $notification]);
    }
}
