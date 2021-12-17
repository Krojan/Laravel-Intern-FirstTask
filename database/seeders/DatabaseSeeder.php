<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\UserProfile;
use Database\Factories\UserProfileFactory;
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
         User::factory(4)->create();
        Category::factory(5)->create();
        Product::factory(5)->create();
        Banner::factory(5)->create();
        UserProfile::factory(5)->create();
        User::factory()->create(['name'=>'admin', 'password'=>'$2y$10$XNW4ZLORq0wx9quLi06LuuOP9ErBcDodSLV83Y9f5g.Gc/6tWoVn2', 'email'=>'admin@admin']);


    }
}
