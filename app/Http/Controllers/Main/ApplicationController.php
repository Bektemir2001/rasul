<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index(){
        return view('main.application');
    }

    public function application(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email'
        ]);

        Application::create($data);
        $notification = 'Ваша заявка отправлена, ожидайте ответа';
        return redirect()->route('index')->with(['notification' => $notification]);
    }
}
