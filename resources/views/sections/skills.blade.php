<section id="skills" class="bg-white py-24">

    <div class="container mx-auto px-6">

        {{-- Section Title --}}
        <x-section-title title="Skills & Technologies" subtitle="Technologies I Use"
            description="Berbagai bahasa pemrograman, framework, database, dan tools yang saya gunakan dalam membangun aplikasi web." />

        {{-- Skill List --}}
        @if ($skills->isNotEmpty())

            <div class="mt-16 grid grid-cols-2 gap-6 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">

                @foreach ($skills as $skill)
                    <div data-aos="zoom-in" data-aos-delay="{{ $loop->iteration * 50 }}">

                        <x-card.skill-card :skill="$skill" />

                    </div>
                @endforeach

            </div>
        @else
            <div class="mt-16">

                <x-ui.empty-state title="Belum Ada Skill"
                    description="Data skill akan ditampilkan setelah ditambahkan melalui Dashboard Admin." />

            </div>

        @endif

    </div>

</section>
