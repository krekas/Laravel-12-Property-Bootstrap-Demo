<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Agent;
use App\Models\Property;
use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Agent::factory(6)->create();
        Testimonial::factory(20)->create();
        Property::factory(100)
            ->hasImages(3)
            ->create();
    }
}
