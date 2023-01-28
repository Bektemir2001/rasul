<?php

namespace App\Http\Controllers\Main\Woman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Main\Woman\ApplicationRequest;
use App\Models\User;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function __invoke(ApplicationRequest $request, User $user){
        $data = $request->validated();
        $data['passport_image'] = Storage::disk('public')->put('passport_images', $data['passport_image']);
        $data['certificate_image'] = Storage::disk('public')->put('certificate_images', $data['certificate_image']);
        $data['user_id'] = $user->id;
        unset($data['g-recaptcha-response']);
        $applications = $user->application;
        foreach($applications as $application){
        Storage::disk('public')->delete($application->passport_image);
        Storage::disk('public')->delete($application->certificate_image);
        	$application->forceDelete();
        }
        Application::create($data);
        $notification = 'Ваша заявка отправлена, ожидайте ответа';
        return back()->with(['notification' => $notification]);
    }
}
