<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Student;
use App\Mail\SendMessage;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function __invoke(){
        $n = 5;
        return view('admin.test.index', compact('n'));
    }
}
