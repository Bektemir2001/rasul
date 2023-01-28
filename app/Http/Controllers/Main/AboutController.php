<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class AboutController extends Controller
{
    public function __invoke(){
        return view('main.about');
    }
}
