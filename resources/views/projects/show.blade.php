<section id="certificates" class="bg-white py-24">

    <div class="container mx-auto px-6">

        <x-section-title title="Certificates" subtitle="Professional Certifications"
            description="Sertifikat yang saya peroleh dari pelatihan, sertifikasi profesi, dan platform pembelajaran." />

        @if ($certificates->isNotEmpty())

            <div class="mt-16 grid gap-8 md:grid-cols-2 xl:grid-cols-3">

                @foreach ($certificates as $certificate)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">

                        <x-card.certificate-card :certificate="$certificate" />

                    </div>
                @endforeach

            </div>
        @else
            <div class="mt-16">

                <x-ui.empty-state title="Belum Ada Sertifikat"
                    description="Sertifikat akan ditampilkan setelah ditambahkan melalui Dashboard Admin." />

            </div>

        @endif

    </div>

</section>
