<section id="certificates" class="bg-slate-50 py-24">
    <div class="container mx-auto px-6">

        <x-section-title subtitle="Sertifikat" title="Sertifikat & Pencapaian Kompetensi"
            description="Berikut adalah sertifikat yang saya miliki dari pelatihan, kursus, dan sertifikasi kompetensi." />

        @if ($certificates->isNotEmpty())
            <div class="mt-16 grid gap-8 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($certificates as $certificate)
                    <x-card.certificate-card :certificate="$certificate" />
                @endforeach
            </div>
        @else
            <div class="mt-16">
                <x-ui.empty-state title="Belum ada sertifikat" description="Data sertifikat belum tersedia saat ini." />
            </div>
        @endif

    </div>
</section>