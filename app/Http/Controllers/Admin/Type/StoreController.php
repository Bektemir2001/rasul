<?php

namespace App\Http\Controllers\Admin\Type;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class StoreController extends Controller
{
    public function __invoke(Request $request){
        $data = $request->validate(['name' => 'required']);

        Type::firstOrCreate($data);
        $notification = 'Сохранено';

        return back()->with(['notification' => $notification]);
    }
}
