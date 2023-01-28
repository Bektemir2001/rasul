<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TestAccess;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TimerController extends Controller
{
    public function __invoke(){
        if(DB::table('test_acceses')->count){
            $last_time = Carbon::now();
            $first_time = DB::table('test_accesses')->first()->created_at;
            $time = DB::table('test_accesses')->time;
            if(($last_time - $first_time) / 60 >= $time){
                DB::table('test_accesses')->delete();
            }
        }
    }
}
