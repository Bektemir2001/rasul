<?php

namespace App\Http\Controllers\Admin\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;


class ShowController extends Controller
{
    public function __invoke(Application $application){
        return view('admin.application.show', compact('application'));
    }
}
