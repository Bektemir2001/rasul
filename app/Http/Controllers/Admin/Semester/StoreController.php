<?php

namespace App\Http\Controllers\Admin\Semester;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;

class StoreController extends Controller
{
    public function __invoke(Request $request){
        $data = $request->validate(['name' => 'required', 'type_id'=>'required']);
        $data['gender'] = auth()->user()->gender;
        Semester::firstOrCreate($data);
        $notification = 'Сохранено';

        return back()->with(['notification' => $notification]);
    }
}
