<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Passport>
 */
class PassportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    
    public function definition(): array
    {
        $country = $this->faker->randomElement(['SD', 'KSA', 'EG']);

        return [
            'name' => $this->faker->sentence(),
            'number' => $this->faker->phoneNumber(),
            'birth_date' => $this->faker->date('Y_m_d'),
            'nationalty' => $country,
            'expiry_date' => $this->faker->date('Y_m_d'),
            'user_id' => 1
        ];
    }
}
