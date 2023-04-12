<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Model;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyProfile>
 */
class CompanyProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->unique()->userName(),
            'desc' => $this->faker->text(),
            'gender'=> $this->faker->randomElement(["male","female"]),
            'salary' => $this->faker->randomNumber(6),
            'dob' => $this->faker->date(),
            // 'work_type' => $this->faker->word(),
            'phone_no' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'address' => $this->faker->address(),
            'start_date' => $this->faker->date(),
        ];
    }
}