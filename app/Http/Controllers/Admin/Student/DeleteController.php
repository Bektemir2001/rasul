<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;

class DeleteController extends Controller
{
    public function __invoke(Student $student){
        $user = $student->user;
        $student->delete();
        $user->delete();
        $notification = "Удалено";
        return redirect()->route('student.index')->with(['notification' => $notification]);
    }
}
