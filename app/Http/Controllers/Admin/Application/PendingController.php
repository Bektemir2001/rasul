<?php

namespace App\Http\Controllers\Admin\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class PendingController extends Controller
{
    public function __invoke(){
        $datas = Application::where('status', 0)
        ->get();
        $applications = [];
        foreach($datas as $data){
            if($data->user->gender == auth()->user()->gender){
                array_push($applications, $data);
            }
        }
        return view('admin.application.painding', compact('applications'));
    }
}
