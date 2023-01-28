<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TestResult;
use App\Models\Student;
use App\Models\Type;

class FilterController extends Controller
{
    public function __invoke(Request $request){
        $datas = Student::where('level', $request->filter)
        ->where('type_id', $request->type)
        ->where('gender', auth()->user()->gender)
        ->get();
        
        if(count($datas)){
            $students = [];
            foreach($datas as $data){
                $test = TestResult::where('test_id', $request->test)
                ->where('user_id', $data->user->id)
                ->get();
                if(count($test)){
                  $s = [
                    'id' => $data->user->id,
                    'name' => $data->user->name,
                    'surname' => $data->user->surname,
                    'status' => 'Сдано',
                    'score' => $test[0]->score
                ];  
                }
                else{
                    $s = [
                    'id' => $data->id,
                    'name' => $data->user->name,
                    'surname' => $data->user->surname,
                    'status' => 'Не сдано',
                    'score' => 0
                ];   
                }
                array_push($students, $s);
                
            }  
        }
        else{
            return response()->json([]);
        }
        
        return response()->json($students);
    }
}
