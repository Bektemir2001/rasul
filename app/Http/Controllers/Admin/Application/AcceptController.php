<?php

namespace App\Http\Controllers\Admin\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Student;
use App\Mail\SendMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class AcceptController extends Controller
{
    public function __invoke(Application $application){
        try{
            DB::beginTransaction();
            Student::create([
                'user_id' => $application->user->id,
                'type_id' => $application->type_id,
                'gender' => $application->user->gender
            ]);
            $application->update(['status' => 2]);
            Mail::to($application->user->email)->send(new SendMessage());
            DB::commit();
        }
        catch(\Exception $exeption){
            DB::rollBack();
            return "Server Error";
        }
        $notification = 'Принято';
        return back()->with(['notification' => $notification]);

    }
}
