<?php

namespace App\Http\Controllers\Admin\Type;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class UpdateController extends Controller
{
    public function __invoke(Request $request, Type $type){
        $data = $request->validate(['name' => 'required|string']);
        $type->update($data);
        $notification = "Изменено";

        return redirect()->route('type.index')->with(['notification' => $notification]);
    }
}
