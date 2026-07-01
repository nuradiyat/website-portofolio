<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {

        $project = Project::create([
            'title' => 'Website Portfolio',
            'slug' => Str::slug('Website Portfolio'),
            'thumbnail' => 'projects/portfolio.jpg',

            'short_description' => 'Website portofolio pribadi.',

            'description' => 'Website portfolio untuk menampilkan profil, pengalaman, project dan sertifikat.',

            'objective' => 'Membangun personal branding.',

            'features' => [
                'Dashboard Admin',
                'CRUD Project',
                'Download CV',
                'Contact Form',
            ],

            'start_date' => '2026-01-01',
            'end_date' => '2026-02-10',

            'status' => 'Completed',

            'github_url' => 'https://github.com/username/portfolio',

            'demo_url' => 'https://portfolio.com',

        ]);

        $project->skills()->attach(

            Skill::whereIn('name', [
                'Laravel',
                'PHP',
                'Tailwind CSS',
                'MySQL',
                'Filament'
            ])->pluck('id')

        );
    }
}
