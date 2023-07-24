<?php

namespace Database\Factories;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        $departments = ['CON', 'CAST', 'CCJ', 'CBA', 'COE'];
        return [
            'fname' => $this->faker->firstName,
            'lname' => $this->faker->lastName,
            'age' => $this->faker->numberBetween(18, 25),
            'address' => $this->faker->address,
            'department' => $this->faker->randomElement($departments),
            'yr_level' => $this->faker->randomElement(['1st Year', '2nd Year', '3rd Year', '4th Year']),
            'adviser' => $this->faker->name,
        ];
    }
}
