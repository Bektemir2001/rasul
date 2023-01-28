<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Event;


class NewsDetailsController extends Controller
{
    public function __invoke(Event $event){
        return view('main.news_details', compact('event'));
    }
}
