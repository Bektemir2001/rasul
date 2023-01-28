<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\TestAccess;
use App\Models\Student;
use App\Models\TestResult;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;



class GiveAccessController extends Controller
{
    public function __invoke(Request $request, Test $test){
        if(DB::table('test_accesses')->count()){

            $last_element = TestAccess::all()->sortDesc()->first();
            $last_time = strtotime(Carbon::now());
            $first_time = strtotime($last_element->created_at);
            $time = round(($last_time - $first_time)/60);
            if($last_element->time + 5 > $time){
                $min = $last_element->time+5 - $time;
                $notification = "Тест уже идет. Ждите $min мин";
                return back()->with(['test_notification' => $notification]);
            }


            DB::table('test_accesses')->delete();


        }
        $data = $request->validate(['time' => 'required|integer', 'students.*' => 'required']);
        if(!array_key_exists('students', $data)){
        	$notification = "Ошибка!!! Вы не выбрали студентов";
            return back()->with(['test_notification' => $notification]);
        	
        }
        $time = $data['time'];
        $students = $data['students'];
        foreach($students as $student){
            $results = TestResult::where('test_id', $test->id)
                        ->where('user_id', $student)
                        ->get();
            foreach($results as $r){
                $r->delete();
            }
            TestAccess::create([
                'user_id' => $student,
                'test_id' => $test->id,
                'time' => $time
            ]);
        }

        $test_notification = "Тест начался";

        session(['test_notification' => $test_notification]);
        return back();
    }
}
