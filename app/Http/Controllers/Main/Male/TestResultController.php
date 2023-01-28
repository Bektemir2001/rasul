<?php

namespace App\Http\Controllers\Main\Male;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Main\Male\ApplicationRequest;
use App\Models\TestAccess;
use App\Models\Application;

class TestResultController extends Controller
{
    public function __invoke(Request $request, TestAccess $test_access){
        dd($request);
        $test = $test_access->test;
        $questions = $test->question;
        $i = 1;
        return view('main.male.test', compact('test', 'questions', 'test_access', 'i'));
    }
}
