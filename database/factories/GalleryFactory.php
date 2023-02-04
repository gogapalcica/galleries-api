<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    public function definition()
    {
        return [
            'title'=>fake()->domainName(),
            'description'=>fake()->sentence(),
            'url'=> array(fake()->imageUrl()),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
