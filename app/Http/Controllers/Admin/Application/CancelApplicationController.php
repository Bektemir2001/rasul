<?php

namespace App\Http\Controllers\Admin\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Mail\CancelApplication;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class CancelApplicationController extends Controller
{
    public function __invoke(Application $application){
        try{
            DB::beginTransaction();
            if($application->status == 2){
                $student = $application->user->student[array_key_last($application->user->student->toArray())];
                $student->delete();
            }
            $application->update(['status' => 1]);
            Mail::to($application->user->email)->send(new CancelApplication());
            DB::commit();
        }
        catch(\Exception $exeption){
            DB::rollBack();
            dd($exeption);
        }
        $notification = 'заявка отклонена';
        return back()->with(['notification' => $notification]);
    }
}
