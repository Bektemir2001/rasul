<?php

namespace App\Http\Controllers\Admin\Semester;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;

class DeleteController extends Controller
{
    public function __invoke(Semester $semester){

        $semester->delete();
        $notification = "Тип ".$semester->name." удалено";

        return back()->with(['notification' => $notification]);
    }
}
