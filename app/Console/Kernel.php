<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Http\Controllers\Admin\Test\TimerController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // DB::table('test_accesses')->delete();
            if(DB::table('test_accesses')->count()){
                // DB::table('test_accesses')->delete();
                $last_time = Carbon::now();
                $first_time = DB::table('test_accesses')->first()->created_at;
                $time = DB::table('test_accesses')->first()->time;
                if((strtotime($last_time) - strtotime($first_time)) / 60 >= $time){
                    DB::table('test_accesses')->delete();
                }
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
