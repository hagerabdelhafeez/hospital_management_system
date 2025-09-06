<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $SingleService = new Service();
        $SingleService->price = 500;
        $SingleService->status = 1;
        $SingleService->save();

        // store trans
        $SingleService->name = 'كشف';
        $SingleService->save();
    }
}
