<?php

    namespace Database\Factories;
    use App\Models\Student;
    use Illuminate\Database\Eloquent\Factories\Factory;

    /**
     * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
     */
    class StudentFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
        {
            return [
                'firstName' => fake()->firstName(),
                'lastName' => fake()->lastName(),
                'email' => fake()->safeEmail(),
                'password' => fake()->password(),
                'created_at' => fake()->date(),
                'updated_at' => fake()->date(),
            ];
        }
    }
