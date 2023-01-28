<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DeleteController extends Controller
{
    public function __invoke(User $user){
        $applications = $user->application;
        if(count($applications)){
            foreach($applications as $application){
                $application->delete();
            }
        }

        $user->delete();
        return redirect()->route('user.index');
    }
}
