<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Building;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organization>
 */
class OrganizationFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Organization::class;


    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'building_id' => Building::inRandomOrder()->first()->id, // Binding to a random building
        ];
    }
}
