<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Type;
use App\Models\User;
use App\Models\Student;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Student::class;
    public function definition()
    {
        $user = User::create([
            'name' => $this->faker->name(),
            'surname' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'role' => 'teacher',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        return [
            'user_id' => $user->id,
            'type_id' => Type::get()->random()->id,
            'address' => $this->faker->address(),
            'content' => $this->faker->text(),
            'age' => 30,
            'image' => 'https://avatars.mds.yandex.net/i?id=1ec55abea3024c706388edcd1184f2ee-5916170-images-thumbs&n=13'
        ];
    }
}
