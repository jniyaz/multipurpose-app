<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'phone_number' => $this->faker->phoneNumber(),
            'country_code' => $this->faker->countryCode(),
            'website' => $this->faker->url(),
            'address_1' => $this->faker->streetAddress(),
            'address_2' => $this->faker->secondaryAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'country' => $this->faker->country(),
            'biography' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'avatar' => null,
            'is_favourite' => $this->faker->boolean(),
        ];
    }
}
