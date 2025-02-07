<?php

namespace Database\Factories;

use App\Models\Organization;
use App\Models\OrganizationPhone;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrganizationPhone>
 */
class OrganizationPhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = OrganizationPhone::class;

    public function definition(): array
    {
        return [
            'organization_id' => Organization::inRandomOrder()->first()->id, // Binding to the organisation
            'phone_number' => $this->faker->phoneNumber, // Generating a phone
        ];
    }
}
