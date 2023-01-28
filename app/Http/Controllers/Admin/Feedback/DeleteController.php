<?php

namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class DeleteController extends Controller
{
    public function __invoke(Feedback $feedback){
        $feedback->delete();
        $notification = 'Удалено';
        return redirect()->route('feedback.index')->with(['notification' => $notification]);
    }
}
