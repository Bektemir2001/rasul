<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Event;
use App\Models\Student;

class IndexController extends Controller
{
    public function __invoke(){
        $users = User::where('gender', auth()->user()->gender)->get();
        $students = Student::where('gender', auth()->user()->gender)->get();
        $lessons = Lesson::where('gender', auth()->user()->gender)->get();
        $events = Event::all();
        return view('admin.index', compact('users', 'students', 'lessons', 'events'));
    }
}
