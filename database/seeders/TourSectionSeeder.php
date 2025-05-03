<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TourSection;

class TourSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tourSections = [
            ['tour_section_name' => 'MONTH'],
            ['tour_section_name' => 'SIGHTSEEING'],
            ['tour_section_name' => 'ASIA'],
        ];

        foreach ($tourSections as $section) {
            TourSection::updateOrCreate(
                ['tour_section_name' => $section['tour_section_name']],
                $section
            );
        }
    }
}
