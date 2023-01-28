<?php

namespace App\Http\Controllers\Admin\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class CanceledController extends Controller
{
    public function __invoke(){
        $datas = Application::where('status', 1)
        ->get();
        $applications = [];
        foreach($datas as $data){
            if($data->user->gender == auth()->user()->gender){
                array_push($applications, $data);
            }
        }
        return view('admin.application.canceled', compact('applications'));
    }
}
