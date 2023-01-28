<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Type;
use App\Models\TestQuestion;


class ShowController extends Controller
{
    public function __invoke(Test $test){
        $questions = TestQuestion::where('test_id', $test->id)->get();
        $types = Type::all();
        return view('admin.test.show', compact('test', 'questions', 'types'));
    }
}
