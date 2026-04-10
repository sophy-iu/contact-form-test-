<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'category_id' => 1,

            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,

            'gender' => $this->faker->numberBetween(1, 3),

            'email' => $this->faker->safeEmail,

            'tell' => $this->faker->numerify('###########'),

            'address' => $this->faker->address,

            'building' => $this->faker->optional()->secondaryAddress,

            'detail' => $this->faker->realText(50),
        ];
    }
}