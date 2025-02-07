<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Organization;
use App\Models\OrganizationPhone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organization::factory()
            ->count(10) // Create 10 organisations
            ->create()
            ->each(function ($organization) {
                OrganizationPhone::factory()
                    ->count(rand(1, 3)) // Create 1-3 phones per organisation
                    ->create(['organization_id' => $organization->id]);

                $activities = Activity::inRandomOrder()->take(rand(1, 3))->pluck('id');
                $organization->activities()->attach($activities);

            });
    }
}
