<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description'=>$this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'rating'=>$this->faker->numberBetween(0,5),
            'sender_id'=>\App\Models\User::inRandomOrder()->first()->id,
        ];
    }
}
