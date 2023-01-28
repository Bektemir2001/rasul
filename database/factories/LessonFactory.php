<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lesson;
use App\Models\Semester;

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Lesson::class;
    public function definition()
    {
        return [
            'name' => $this->faker->title(),
            'semester_id' => Semester::get()->random()->id,
            'image' => 'storage/lessons/pwCzNv0pAH1tN1kCyTgsnafUiP9X6k6Zzcl2LO5K.jpg'
        ];
    }
}
