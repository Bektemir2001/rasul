<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Lesson;

class EditController extends Controller
{
    public function __invoke(Test $test){
        $lessons = Lesson::all();
        return view('admin.test.edit', compact('test', 'lessons'));
    }
}
