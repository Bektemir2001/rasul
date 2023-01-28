<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\TestQuestion;


class DeleteQuestionController extends Controller
{
    public function __invoke(TestQuestion $question){
        $question->forceDelete();
        $notification = 'Удалено';
        return back()->with(['notification' => $notification]);
    }
}
