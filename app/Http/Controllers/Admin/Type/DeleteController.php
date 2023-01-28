<?php

namespace App\Http\Controllers\Admin\Type;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class DeleteController extends Controller
{
    public function __invoke(Type $type){

        $type->delete();
        $notification = "Тип ".$type->name." удалено";

        return back()->with(['notification' => $notification]);
    }
}
