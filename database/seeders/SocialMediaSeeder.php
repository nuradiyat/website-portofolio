<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    public function run(): void
    {
        SocialMedia::insert([

            [
                'platform' => 'GitHub',
                'url' => 'https://github.com/username',
                'icon' => 'github',
                'display_order' => 1,
            ],

            [
                'platform' => 'LinkedIn',
                'url' => 'https://linkedin.com/in/username',
                'icon' => 'linkedin',
                'display_order' => 2,
            ],

            [
                'platform' => 'Instagram',
                'url' => 'https://instagram.com/username',
                'icon' => 'instagram',
                'display_order' => 3,
            ],

        ]);
    }
}
