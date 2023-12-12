<?php

namespace Database\Factories;

use App\Models\DonateInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DonateInfo>
 */
class DonateInfoFactory extends Factory
{
    protected $model = DonateInfo::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->randomFloat(2, 10, 1000),
            'project_id' => $this->faker->numberBetween(1, 29),
            'user_id' => $this->faker->numberBetween(1, 21),
            'method' => $this->faker->randomElement(['Bank']),
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'message' => $this->faker->text,
        ];
    }
}
