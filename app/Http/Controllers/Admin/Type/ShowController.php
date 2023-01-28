<?php

namespace App\Http\Controllers\Admin\Type;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class ShowController extends Controller
{
    public function __invoke(Type $type){
        return view('admin.type.show', compact('type'));
    }
}
