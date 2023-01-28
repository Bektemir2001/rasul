<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class UpLevelController extends Controller
{
    public function __invoke(Request $request){
        $student = Student::where('id', $request->id)->get();
        if($student[0]->level == 4){
            return response(['level' => 4]);
        }
        $student[0]->update([
            'level' => $student[0]->level + 1
        ]);

        return response(['level' => $student[0]->level]);
    }
}
