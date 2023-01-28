<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\TestResult;
use Illuminate\Support\Facades\DB;

class TestResultController extends Controller
{
    public function __invoke(Request $request,Test $test){

        try{
            DB::beginTransaction();

            $answers = $request->validate([
                'answer.*' => ''
            ]);
            if(array_key_exists('answer', $answers)){
                $answers = $answers['answer'];
            }
            $max_score = $test->max_score;
            $students_score = 0;
            $questions = $test->question;
            foreach($questions as $question){
                if(array_key_exists("$question->id", $answers)){
                    // dd($answers["$question->id"]);
                    if($answers["$question->id"] == $question->right_answer){
                        $students_score += $question->score;
                    }
                }
            }
            $persent = round(($students_score/$max_score)*100);
            TestResult::create([
                'user_id' => auth()->user()->id,
                'test_id' => $test->id,
                'score' => $students_score,
                'percent' => $persent
            ]);

            $test_access = auth()->user()->accessTest[0];
            $test_access->delete();
            DB::commit();
        }catch(\Exception $exeption){
            DB::rollBack();
            return "server error";
        }
        $notification = 'Проверка прошла успешно. Результаты вы можете увидеть в личном кабинете';
        return back()->with(['notification' => $notification]);
    }
}
