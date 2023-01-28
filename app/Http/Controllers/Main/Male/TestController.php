<?php

namespace App\Http\Controllers\Main\Male;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Main\Male\ApplicationRequest;
use App\Models\TestAccess;
use App\Models\Application;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;


class TestController extends Controller
{
    public function __invoke(TestAccess $test_access){
        $test = $test_access->test;
        $questions = $test->question;
        $firstTime = $test_access->created_at;
        $lastTime = Carbon::now();
        $firstTime=strtotime($firstTime);
        $lastTime=strtotime($lastTime);
        $time_s = ($lastTime-$firstTime)/1000;
        $time_m = round($test_access->time - ($time_s / 60));
        $time_s = 0;
        // dd($firstTime, $lastTime, $test_access->created_at, Carbon::now());
        $i = 1;
        session(['test_time_m'=>$time_m,
                 'test_time_s' => $time_s]);
        // dd($time_m, $time_s);
        return view('main.male.test', compact('test', 'questions', 'test_access', 'i'));
    }
}

