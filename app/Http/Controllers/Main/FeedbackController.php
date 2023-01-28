<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Main\FeedbackRequest;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function __invoke(FeedbackRequest $request){
        $data = $request->validated();
        unset($data['g-recaptcha-response']);
        Feedback::create($data);
        $notification = 'Сохранено';
        return back()->with(['notifiction' => $notification]);
    }
}
