<?php

namespace Database\Seeders;

use App\Models\RayEmployee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RayEmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ray_employee = new RayEmployee();
        $ray_employee->name = 'محمد السيد';
        $ray_employee->email = 'r@r.com';
        $ray_employee->password = Hash::make('password');
        $ray_employee->save();
    }
}
