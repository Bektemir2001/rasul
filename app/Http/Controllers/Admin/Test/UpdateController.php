<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Lesson;
use App\Models\TestQuestion;
use App\Http\Requests\Admin\Test\StoreRequest;

class UpdateController extends Controller
{
    public function __invoke(StoreRequest $request, Test $test){
        $data = $request->validated();
        $test->update($data);
        $notification = 'Изменено';
        return redirect()->route('test.index')->with(['notification' => $notification]);
    }
}
