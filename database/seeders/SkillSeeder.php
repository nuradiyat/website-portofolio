<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [

            ['name' => 'HTML', 'category' => 'Programming Language'],
            ['name' => 'CSS', 'category' => 'Programming Language'],
            ['name' => 'JavaScript', 'category' => 'Programming Language'],
            ['name' => 'PHP', 'category' => 'Programming Language'],
            ['name' => 'Python', 'category' => 'Programming Language'],

            ['name' => 'Laravel', 'category' => 'Framework'],
            ['name' => 'Filament', 'category' => 'Framework'],
            ['name' => 'Bootstrap', 'category' => 'Framework'],
            ['name' => 'Tailwind CSS', 'category' => 'Framework'],

            ['name' => 'MySQL', 'category' => 'Database'],

            ['name' => 'Git', 'category' => 'Tools'],
            ['name' => 'GitHub', 'category' => 'Tools'],
            ['name' => 'Docker', 'category' => 'Tools'],
            ['name' => 'Postman', 'category' => 'Tools'],
            ['name' => 'Figma', 'category' => 'Tools'],
            ['name' => 'VS Code', 'category' => 'Tools'],

        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
