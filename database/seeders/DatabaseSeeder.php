<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Type::factory(5)->create();
        \App\Models\Student::factory(20)->create();
        \App\Models\Teacher::factory(20)->create();
        \App\Models\Semester::factory(10)->create();
        \App\Models\Lesson::factory(20)->create();
        \App\Models\Event::factory(20)->create();
    }
}
