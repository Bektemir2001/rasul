<?php

namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class IndexController extends Controller
{
    public function __invoke(){
        $feedback = Feedback::all();
        return view('admin.feedback.index', compact('feedback'));
    }
}
