<?php

namespace Database\Factories;

use App\Models\Sitter;
use Illuminate\Database\Eloquent\Factories\Factory;

class SitterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sitter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description'=>$this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'account_id' => \App\Models\User::factory()->create()->id,
        ];
    }
}
