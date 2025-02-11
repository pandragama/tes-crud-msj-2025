<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'gender' => fake()->randomElement(['male', 'female']),
            'address' => fake()->address(),
            'dob' => fake()->date('Y-m-d', 'now - 18 years'), // Menghasilkan tanggal lahir minimal 18 tahun yang lalu
            'dept_id' => Department::inRandomOrder()->first()->id, // Mengambil department secara acak dari tabel departments
            'status' => fake()->randomElement(['cont', 'emp', 'not_act'])
        ];
    }
}
