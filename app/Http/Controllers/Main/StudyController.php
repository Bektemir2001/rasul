<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class StudyController extends Controller
{
    public function __invoke(){
        return view('main.study');
    }
}
