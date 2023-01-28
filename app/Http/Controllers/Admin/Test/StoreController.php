<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Lesson;
use App\Models\TestQuestion;
use App\Http\Requests\Admin\Test\StoreRequest;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        $data = $request->validated();
        $test = Test::create($data);
        return redirect()->route('test.show', $test->id);
    }
}
