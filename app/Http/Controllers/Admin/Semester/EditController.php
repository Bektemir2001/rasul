<?php

namespace App\Http\Controllers\Admin\Semester;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\Type;

class EditController extends Controller
{
    public function __invoke(Semester $semester){
        $types = Type::all();
        return view('admin.semester.edit', compact('semester', 'types'));
    }
}
