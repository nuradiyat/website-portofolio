<section id="about" class="bg-slate-50 py-24">

    <div class="container mx-auto px-6">

        <x-section-title title="About Me" subtitle="Get to Know Me Better" />

        <div class="mt-16 grid items-center gap-14 lg:grid-cols-2">

            {{-- Profile Image --}}
            <div data-aos="fade-right" class="flex justify-center">

                <div class="relative">

                    {{-- Background Decoration --}}
                    <div class="absolute -left-6 -top-6 h-full w-full rounded-3xl bg-blue-600/10">
                    </div>

                    <img src="{{ Storage::url($profile->photo) }}" alt="{{ $profile->full_name }}" loading="lazy"
                        class="relative h-[420px] w-full max-w-sm rounded-3xl object-cover shadow-2xl">

                </div>

            </div>

            {{-- About Content --}}
            <div data-aos="fade-left">

                <x-ui.badge text="About Me" />

                <h2 class="mt-6 text-4xl font-bold leading-tight text-slate-900">

                    {{ $profile->full_name }}

                </h2>

                <h3 class="mt-2 text-xl font-semibold text-blue-600">

                    {{ $profile->profession }}

                </h3>

                <p class="mt-8 text-lg leading-8 text-slate-600">

                    {{ $profile->about }}

                </p>

                {{-- Quick Information --}}
                <div class="mt-10 grid gap-5 sm:grid-cols-2">

                    <div class="rounded-2xl border border-slate-200 bg-white p-5">

                        <h4 class="font-semibold text-slate-900">

                            Experience

                        </h4>

                        <p class="mt-2 text-slate-500">

                            Professional projects and organizational experience.

                        </p>

                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-5">

                        <h4 class="font-semibold text-slate-900">

                            Technologies

                        </h4>

                        <p class="mt-2 text-slate-500">

                            Laravel, PHP, Python, MySQL, Tailwind CSS and more.

                        </p>

                    </div>

                </div>

                {{-- CTA --}}
                <div class="mt-10 flex flex-wrap gap-4">

                    <x-button href="#projects">

                        View My Projects

                    </x-button>

                    <x-button :href="Storage::url($profile->cv_file)" target="_blank" variant="outline">

                        Download CV

                    </x-button>

                </div>

            </div>

        </div>

    </div>

</section>