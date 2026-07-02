<section id="projects" class="bg-slate-50 py-24">
    <div class="container mx-auto px-6">

        {{-- Section Title --}}
        <x-section-title title="Projects" subtitle="Featured Projects"
            description="Beberapa proyek yang pernah saya kerjakan menggunakan berbagai teknologi modern." />

        @if ($projects->isNotEmpty())
            <div class="mt-14 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($projects as $project)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <x-card.project-card :project="$project" />
                    </div>
                @endforeach
            </div>

            {{-- View All --}}
            <div class="mt-14 text-center">
                <x-button :href="route('projects.index')" variant="outline">
                    View All Projects
                </x-button>
            </div>
        @else
            <div class="mt-14">
                <x-ui.empty-state title="Belum Ada Project"
                    description="Project akan ditampilkan setelah ditambahkan melalui Dashboard Admin." />
            </div>
        @endif

    </div>
</section>
