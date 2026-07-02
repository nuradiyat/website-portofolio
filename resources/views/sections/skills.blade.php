<section id="skills" class="overflow-hidden bg-white py-24">

    <div class="container mx-auto px-6">

        {{-- Section Title --}}
        <x-section-title title="Skills & Technologies" subtitle="Technologies I Use"
            description="Berbagai bahasa pemrograman, framework, database, dan tools yang saya gunakan dalam membangun aplikasi web." />

        @if ($skills->isNotEmpty())
            @php
                $skillsCollection = $skills instanceof \Illuminate\Support\Collection ? $skills : collect($skills);

                $chunkSize = (int) ceil($skillsCollection->count() / 2);

                $firstRow = $skillsCollection->take($chunkSize);
                $secondRow = $skillsCollection->slice($chunkSize);

                // fallback kalau data sedikit / ganjil
                if ($secondRow->isEmpty()) {
                    $secondRow = $firstRow;
                }
            @endphp

            <div class="mt-16 space-y-6">

                {{-- ROW 1 - bergerak ke kiri --}}
                <div class="relative overflow-hidden" data-aos="fade-up">
                    {{-- efek fade kiri --}}
                    <div
                        class="pointer-events-none absolute left-0 top-0 z-10 h-full w-16 bg-gradient-to-r from-white to-transparent sm:w-24">
                    </div>

                    {{-- efek fade kanan --}}
                    <div
                        class="pointer-events-none absolute right-0 top-0 z-10 h-full w-16 bg-gradient-to-l from-white to-transparent sm:w-24">
                    </div>

                    <div class="skills-marquee skills-marquee-left">
                        <div class="skills-track">
                            @foreach ($firstRow as $skill)
                                <div class="skills-item">
                                    <x-card.skill-card :skill="$skill" />
                                </div>
                            @endforeach

                            {{-- duplicate untuk loop mulus --}}
                            @foreach ($firstRow as $skill)
                                <div class="skills-item">
                                    <x-card.skill-card :skill="$skill" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- ROW 2 - bergerak ke kanan --}}
                <div class="relative overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                    {{-- efek fade kiri --}}
                    <div
                        class="pointer-events-none absolute left-0 top-0 z-10 h-full w-16 bg-gradient-to-r from-white to-transparent sm:w-24">
                    </div>

                    {{-- efek fade kanan --}}
                    <div
                        class="pointer-events-none absolute right-0 top-0 z-10 h-full w-16 bg-gradient-to-l from-white to-transparent sm:w-24">
                    </div>

                    <div class="skills-marquee skills-marquee-right">
                        <div class="skills-track">
                            @foreach ($secondRow as $skill)
                                <div class="skills-item">
                                    <x-card.skill-card :skill="$skill" />
                                </div>
                            @endforeach

                            {{-- duplicate untuk loop mulus --}}
                            @foreach ($secondRow as $skill)
                                <div class="skills-item">
                                    <x-card.skill-card :skill="$skill" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        @else
            <div class="mt-16">
                <x-ui.empty-state title="Belum Ada Skill"
                    description="Data skill akan ditampilkan setelah ditambahkan melalui Dashboard Admin." />
            </div>
        @endif

    </div>

    {{-- STYLE ANIMASI KHUSUS SECTION SKILLS --}}
    <style>
        .skills-marquee {
            width: 100%;
            overflow: hidden;
            position: relative;
        }

        .skills-track {
            display: flex;
            align-items: stretch;
            gap: 1rem;
            width: max-content;
        }

        .skills-item {
            flex: 0 0 auto;
            width: 220px;
        }

        /* Baris 1 ke kiri */
        .skills-marquee-left .skills-track {
            animation: skills-marquee-left 28s linear infinite;
        }

        /* Baris 2 ke kanan */
        .skills-marquee-right .skills-track {
            animation: skills-marquee-right 28s linear infinite;
        }

        @keyframes skills-marquee-left {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(calc(-50% - 0.5rem));
            }
        }

        @keyframes skills-marquee-right {
            0% {
                transform: translateX(calc(-50% - 0.5rem));
            }

            100% {
                transform: translateX(0);
            }
        }

        /* pause saat hover supaya user bisa fokus baca */
        .skills-marquee:hover .skills-track {
            animation-play-state: paused;
        }

        /* responsive */
        @media (max-width: 1024px) {
            .skills-item {
                width: 200px;
            }

            .skills-marquee-left .skills-track,
            .skills-marquee-right .skills-track {
                animation-duration: 24s;
            }
        }

        @media (max-width: 768px) {
            .skills-item {
                width: 180px;
            }

            .skills-marquee-left .skills-track,
            .skills-marquee-right .skills-track {
                animation-duration: 20s;
            }
        }

        @media (max-width: 480px) {
            .skills-item {
                width: 160px;
            }

            .skills-marquee-left .skills-track,
            .skills-marquee-right .skills-track {
                animation-duration: 18s;
            }
        }

        /* kurangi animasi jika user prefer reduced motion */
        @media (prefers-reduced-motion: reduce) {

            .skills-marquee-left .skills-track,
            .skills-marquee-right .skills-track {
                animation: none;
            }
        }
    </style>

</section>
