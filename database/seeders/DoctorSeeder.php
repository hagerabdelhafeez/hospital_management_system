<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::factory(30)->create();
        $appointments = Appointment::all();
        Doctor::all()->each(function ($doctor) use ($appointments) {
            $doctor->appointments()->attach(
                $appointments->random(rand(1, 7))->pluck('id')->toArray()
            );
        });
    }
}
