<?php

namespace App\Http\Controllers\Admin\Type;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class IndexController extends Controller
{
    public function __invoke(){
        $datas = Type::all();

        return view('admin.type.index', compact('datas'));
    }
}
