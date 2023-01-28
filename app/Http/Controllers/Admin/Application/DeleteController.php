<?php

namespace App\Http\Controllers\Admin\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function __invoke(Application $application){
        Storage::disk('public')->delete($application->passport_image);
        Storage::disk('public')->delete($application->certificate_image);
        $application->forceDelete();
        return view('admin.user.index', compact('users'));
    }
}
