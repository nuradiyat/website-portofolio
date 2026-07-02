<section id="certificates" class="bg-slate-50 py-24">
    <div class="container mx-auto px-6">

        <x-section-title subtitle="Sertifikat" title="Sertifikat & Pencapaian Kompetensi"
            description="Berikut adalah sertifikat yang saya miliki dari pelatihan, kursus, dan sertifikasi kompetensi." />

        @if ($certificates->isNotEmpty())
            <div class="mt-14 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($certificates as $certificate)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <x-card.certificate-card :certificate="$certificate" />
                    </div>
                @endforeach
            </div>
        @else
            <div class="mt-14">
                <x-ui.empty-state title="Belum ada sertifikat" description="Data sertifikat belum tersedia saat ini." />
            </div>
        @endif

    </div>
</section>
