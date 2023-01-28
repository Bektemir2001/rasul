<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function __invoke(){
        $user = auth()->user();
        return view('student.profil', compact('user'));
    }

}
