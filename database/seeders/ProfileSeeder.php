<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::create([
            'full_name' => 'Muhammad Nuradiyat',
            'profession' => 'Web Developer',
            'profile_photo' => 'profiles/profile.jpg',
            'cv_file' => 'cv/muhammad-nuradiyat-cv.pdf',
            'short_bio' => 'Web Developer yang berfokus pada Laravel, Filament, dan pengembangan aplikasi web modern.',
            'about' => 'Saya merupakan mahasiswa yang memiliki ketertarikan pada pengembangan aplikasi web menggunakan Laravel, Filament, PHP, dan MySQL. Saya senang membangun aplikasi yang bersih, mudah digunakan, dan memiliki performa yang baik.',
        ]);
    }
}
