<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::insert([

            [
                'name' => 'Andi Saputra',
                'position' => 'Backend Developer',
                'organization' => 'ABC Technology',
                'message' => 'Memiliki kemampuan problem solving yang sangat baik.',
            ],

            [
                'name' => 'Budi Pratama',
                'position' => 'Project Manager',
                'organization' => 'XYZ Digital',
                'message' => 'Mampu bekerja sama dalam tim dan menyelesaikan project tepat waktu.',
            ],

        ]);
    }
}
