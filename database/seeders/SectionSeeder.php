<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Section::factory()
            ->count(7)
            ->sequence(
                ['name' => 'قسم الجراحة'],
                ['name' => 'قسم الأطفال'],
                ['name' => 'قسم النساء والتوليد'],
                ['name' => 'قسم الباطنة'],
                ['name' => 'قسم الطوارئ'],
                ['name' => 'قسم العظام'],
                ['name' => 'قسم الكلى'],
            )->create();
    }
}
