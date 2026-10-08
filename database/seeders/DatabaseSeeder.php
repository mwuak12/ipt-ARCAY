<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Appointment;
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
        Doctor::factory(50)->create();
        Appointment::factory(50)->create();
    }
}
