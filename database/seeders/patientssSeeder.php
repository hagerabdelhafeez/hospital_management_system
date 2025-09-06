<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class patientssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Patients = new Patient();
        $Patients->email = 'p@p.com';
        $Patients->Password = Hash::make('password');
        $Patients->Date_Birth = '1988-12-01';
        $Patients->Phone = '123456789';
        $Patients->Gender = 1;
        $Patients->Blood_Group = 'A+';
        $Patients->save();

        // insert trans
        $Patients->name = 'محمد السيد';
        $Patients->Address = 'القاهرة';
        $Patients->save();
    }
}
