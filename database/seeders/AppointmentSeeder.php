<?php

namespace Database\Seeders;

use App\Models\Appointment;

use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Seed appointment records.
     */
    public function run(): void
    {
        Appointment::factory()->count(50)->create();
    }
}
