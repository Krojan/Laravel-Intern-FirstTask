<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id'=>Category::factory(),
//            name,slug,status,price,images, description
            'name'=>$this->faker->name(),
            'slug'=>$this->faker->slug(),
            'status'=>$this->faker->boolean(),
            'price'=>$this->faker->randomDigit(),
            'image_name'=>$this->faker->image(public_path('images'),800,640, null, false),

//            'image_name'=>'https://placeimg.com/100/100/any?' . rand(1, 100),
//            'image_name'=>$this->faker->randomElement(['house1.jpg', 'house2.jpg', 'house3.jpg', 'house4.jpg']),
            'description'=>$this->faker->text()
        ];
    }
}
