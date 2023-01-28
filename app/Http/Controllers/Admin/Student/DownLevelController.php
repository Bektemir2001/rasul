<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class DownLevelController extends Controller
{
    public function __invoke(Request $request){
        $student = Student::where('id', $request->id)->get();
        if($student[0]->level == 1){
            return response(['level' => 1]);
        }
        $student[0]->update([
            'level' => $student[0]->level - 1
        ]);

        return response(['level' => $student[0]->level]);
    }
}
