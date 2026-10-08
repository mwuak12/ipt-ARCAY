<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Seed patient records.
     */
    public function run(): void
    {
        Patient::factory()->count(50)->create();
    }
}
