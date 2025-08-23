<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Appointmentseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('appointments')->delete();
        $appointments = [
            ['name' => 'السبت'],
            ['name' => 'الأحد'],
            ['name' => 'الاثنين'],
            ['name' => 'الثلاثاء'],
            ['name' => 'الأربعاء'],
            ['name' => 'الخميس'],
            ['name' => 'الجمعة'],
        ];
        foreach ($appointments as $appointment) {
            Appointment::create($appointment);
        }
    }
}
