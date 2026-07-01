<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        Certificate::create([
            'thumbnail' => 'certificates/certificate.jpg',
            'title' => 'Software Development',
            'issuer' => 'BNSP',
            'certificate_number' => 'BNSP-2026-001',
            'issue_year' => 2026,
            'credential_url' => 'https://credential.com',
            'expired_at' => '2029-12-31',
            'description' => 'Sertifikasi kompetensi Software Development.',
            'pdf_file' => 'certificates/software-development.pdf',
        ]);
    }
}
