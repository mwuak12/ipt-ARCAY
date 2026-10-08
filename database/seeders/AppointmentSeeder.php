<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Seed appointment records.
     */
    public function run(): void
    {
        $patients = Patient::query()->get();
        $doctors = Doctor::query()->get();

        if ($patients->isEmpty()) {
            $this->call(PatientSeeder::class);
            $patients = Patient::query()->get();
        }

        if ($doctors->isEmpty()) {
            $this->call(DoctorSeeder::class);
            $doctors = Doctor::query()->get();
        }

        for ($index = 0; $index < 50; $index++) {
            Appointment::factory()
                ->for($patients->random())
                ->for($doctors->random())
                ->create();
        }
    }
}
