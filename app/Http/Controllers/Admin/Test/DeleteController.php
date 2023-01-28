<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\TestQuestion;


class DeleteController extends Controller
{
    public function __invoke(Test $test){
        $questions = $test->question;
        foreach($questions as $question){
            $question->delete();
        }
        $test->delete();
        $notification = 'Удалено';
        return redirect()->route('test.index')->with(['notification' => $notification]);
    }
}
