<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return array(
//            name,slug,status,image
                'name'=>$this->faker->name(),
                'slug'=>$this->faker->slug(),
                'status'=>$this->faker->boolean(),
//                'image_name'=>'https://placeimg.com/100/100/any?' . rand(1, 100),
                'image_name'=>$this->faker->image('public/images',800,640, null, false)
//                'image_name'=>$this->faker->image('public\category_images',100,200, null, false)
        );
    }
}
