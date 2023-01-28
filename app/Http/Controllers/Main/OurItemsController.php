<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OurItemsController extends Controller
{
    public function __invoke(){
        return view('main.our_items');
    }
}
