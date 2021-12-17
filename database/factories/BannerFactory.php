<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//            product_id, name,start_date, end_date, banner_image, url
            'product_id'=>Product::factory(),
            'name'=>$this->faker->name,
            'start_date'=>$this->faker->dateTime(),
            'end_date'=>$this->faker->dateTime(),
//            'image_name'=>'https://placeimg.com/100/100/any?' . rand(1, 100),
            'image_name'=>$this->faker->image('public/images',99,99, null, false),
            'url'=>$this->faker->url()
        ];
    }
}
