<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Lesson;
use App\Models\TestQuestion;

use App\Http\Requests\Admin\Test\AddQuestionRequest;

class AddQuestionController extends Controller
{
    public function __invoke(AddQuestionRequest $request, Test $test){
        $data = $request->validated();
        $data['test_id'] = $test->id;
        TestQuestion::create($data);
        $test->update([
            'count' => $test->count + 1,
            'max_score' => $test->max_score + $data['score'],
        ]);
        return redirect()->route('test.show', $test->id);
    }
}
