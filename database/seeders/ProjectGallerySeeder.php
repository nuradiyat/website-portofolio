<?php

namespace Database\Seeders;

use App\Models\ProjectGallery;
use Illuminate\Database\Seeder;

class ProjectGallerySeeder extends Seeder
{
    public function run(): void
    {
        ProjectGallery::insert([
            [
                'project_id' => 1,
                'image' => 'projects/gallery-1.jpg',
                'caption' => 'Landing Page',
            ],
            [
                'project_id' => 1,
                'image' => 'projects/gallery-2.jpg',
                'caption' => 'Dashboard Admin',
            ],
            [
                'project_id' => 1,
                'image' => 'projects/gallery-3.jpg',
                'caption' => 'Project Detail',
            ],
        ]);
    }
}
