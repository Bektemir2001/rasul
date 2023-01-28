<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Event::class;
    public function definition()
    {
        return [
            'name' => $this->faker->title(),
            'content' => $this->faker->text(),
            'image_main' => 'storage/events/7x7XqBOo4EFfULAXZzzR1ZCb4NxwurAdKF2qV42L.png',
            'image_preview' => 'storage/events/0O0avWLNmiw9BNiR9hAcoO5Dvrd0iNb85B9N1iMV.png'
        ];
    }
}
