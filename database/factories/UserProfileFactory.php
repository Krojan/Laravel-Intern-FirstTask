<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::factory(),
            'address'=>$this->faker->streetAddress(),
            'image_name'=>$this->faker->image('public/images',90,90, null, false),

        ];
    }
}
