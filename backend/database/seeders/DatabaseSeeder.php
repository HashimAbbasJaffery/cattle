<?php

namespace Database\Seeders;

use App\Models\Age;
use App\Models\Animal;
use App\Models\Breed;
use App\Models\Setting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Event;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Breed::factory()->createMany([
            ["breed" => "sahiwal"],
            ["breed" => "cholistani"],
            ["breed" => "red sindhi"],
            ["breed" => "sibi bhagnari"],
            ["breed" => "mix breed"],
            ["breed" => "australian"],
        ]);

        Age::factory()->createMany([
            [ "age" => "below 1 year" ],
            [ "age" => "2 Teeth" ],
            [ "age" => "4 Teeth" ],
            [ "age" => "6 Teeth" ],
            [ "age" => "6 Teeth+" ],
        ]);

        \App\Models\Event::factory()->createMany([
            [
                "event_year" => "2025",
                "months" => 12,
                "percentage" => 1.4
            ],
            [
                "event_year" => "2026",
                "months" => 24,
                "percentage" => 2.8
            ],
            [
                "event_year" => "2027",
                "months" => 36,
                "percentage" => 4.2
            ]
        ]);

        Animal::factory(50)->create();
        Setting::factory()->create([
            "maintenance_fee" => 15_000,
            "percent_addition" => 2,
            "add_if_less_than_criteria" => 2,
            "add_if_above_criteria" => 1.4
        ]);
    }
}
