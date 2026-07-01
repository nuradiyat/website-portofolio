<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        Experience::create([
            'image' => 'experience/company.png',
            'organization' => 'Universitas XYZ',
            'position' => 'Web Developer',
            'type' => 'Internship',
            'start_date' => '2025-01-01',
            'end_date' => '2025-06-30',
            'description' => 'Mengembangkan sistem informasi berbasis Laravel.',
        ]);
    }
}
