<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profileImg' => "profile.jpg",
            'fullname' => fake()->name,
            'dob' => fake()->date(),
            'membership_no' => random_int(1000, 9999),
            'contact' => fake()->phoneNumber(),
            'hometown' => fake()->city(),
            'region' => fake()->city(),
            'residence' => fake()->address(),
            'email' => fake()->email(),
            'fathersname' => fake()->name,
            'mothersname' => fake()->name,
            'next_of_kin' => fake()->name,
            'next_of_kin_contact' => fake()->phoneNumber(),
            'email_of_nok' => fake()->email(),
            'date_baptised' => fake()->date(),
            'yom' => fake()->year(),
            "mask"=> Str::orderedUuid(),
            'profession' => fake()->name(),
            'name_of_company' => fake()->company(),
        ];
    }
}
