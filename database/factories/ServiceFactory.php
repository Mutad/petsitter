<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(3),
            'cost'=>$this->faker->randomFloat(2,0,100),
            'payment_per'=>$this->faker->randomElement(['night' ,'hour', 'walk']),
            'description'=>$this->faker->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
