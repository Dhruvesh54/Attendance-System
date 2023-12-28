<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\employee>
 */
class EmployeeFactory extends Factory
{
  
    public function definition(): array
    {
        return [
            'employee_id' => 'EMP' . $this->faker->randomNumber(9, true),
            'joining_date' => $this->faker->date,
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'mobile' => $this->faker->numerify('##########'),
            'job_title' => $this->faker->jobTitle,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'password' => $this->faker->password,
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
