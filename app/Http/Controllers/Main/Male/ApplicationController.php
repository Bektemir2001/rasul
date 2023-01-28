<?php

namespace App\Http\Controllers\Main\Male;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Main\Male\ApplicationRequest;
use App\Models\User;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function __invoke(ApplicationRequest $request, User $user){
        $data = $request->validated();
        $data['passport_image'] = Storage::disk('public')->put('passport_images', $data['passport_image']);
        $data['certificate_image'] = Storage::disk('public')->put('certificate_images', $data['certificate_image']);
        $data['user_id'] = $user->id;
        $applications = $user->application;
        foreach($applications as $application){
        	Storage::disk('public')->delete($application->passport_image);
        	Storage::disk('public')->delete($application->certificate_image);
        	$application->forceDelete();
        }
        unset($data['g-recaptcha-response']);
        Application::create($data);
        $notification = 'Ваша заявка отправлена, ожидайте ответа';
        return back()->with(['notification' => $notification]);
    }
}
