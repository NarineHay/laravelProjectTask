<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maxDepth = 3;

        foreach (range(1, 10) as $i) { // Creating 10 activities
            $parent = null;

            for ($depth = 1; $depth <= $maxDepth; $depth++) {
                $parent = Activity::factory()->create([
                    'parent_id' => $parent?->id,
                ]);
            }
        }
    }
}
