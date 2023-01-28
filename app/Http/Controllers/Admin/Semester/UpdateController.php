<?php

namespace App\Http\Controllers\Admin\Semester;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;

class UpdateController extends Controller
{
    public function __invoke(Request $request, Semester $semester){
        $data = $request->validate(['name' => 'required|string', 'type_id' => 'required']);
        $semester->update($data);
        $notification = "Изменено";

        return redirect()->route('semester.index')->with(['notification' => $notification]);
    }
}
