<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Lesson;
use App\Models\TestQuestion;

use App\Http\Requests\Admin\Test\ChangeQuestionRequest;

class ChangeQuestionController extends Controller
{
    public function __invoke(ChangeQuestionRequest $request, TestQuestion $question){
        $data = $request->validated();
        $test = $question->test;
        $test->update([
            'max_score' => $test->max_score - $question->score + $data['score'],
        ]);
        $question->update($data);
        $test = $question->test;
        return redirect()->route('test.show', $test->id);
    }
}
