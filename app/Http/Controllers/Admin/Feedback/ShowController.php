<?php

namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class ShowController extends Controller
{
    public function __invoke(Feedback $feedback){
        $feedback->update([
            'status' => 1,
        ]);

        return view('admin.feedback.show', compact('feedback'));
    }
}
