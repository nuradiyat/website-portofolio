<section id="home" class="relative overflow-hidden bg-gradient-to-b from-white via-slate-50 to-white">

    {{-- Background Decoration --}}
    <div class="absolute inset-0 -z-10">

        <div class="absolute -left-40 top-20 h-96 w-96 rounded-full bg-blue-100 blur-3xl opacity-50">
        </div>

        <div class="absolute right-0 top-40 h-96 w-96 rounded-full bg-cyan-100 blur-3xl opacity-50">
        </div>

    </div>

    <div class="container mx-auto px-6 pt-36 pb-24">

        <div class="grid items-center gap-16 lg:grid-cols-2">

            {{-- Left --}}
            <div data-aos="fade-right">

                <span
                    class="inline-flex items-center rounded-full bg-blue-100 px-5 py-2 text-sm font-semibold text-blue-600">

                    👋 Welcome to My Portfolio

                </span>

                <h1 class="mt-6 text-4xl font-extrabold leading-tight text-slate-900 sm:text-5xl lg:text-6xl">

                    Hi, I'm

                    <span class="text-blue-600">

                        {{ $profile->full_name }}

                    </span>

                </h1>

                <h2 class="mt-4 text-2xl font-semibold text-slate-700">

                    {{ $profile->profession }}

                </h2>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-600">

                    {{ $profile->short_bio }}

                </p>

                {{-- Button --}}
                <div class="mt-10 flex flex-wrap gap-4">

                    <x-button :href="Storage::url($profile->cv_file)" target="_blank">

                        Download CV

                    </x-button>

                    <x-button href="#contact" variant="outline">

                        Contact Me

                    </x-button>

                </div>

                {{-- Social --}}
                <div class="mt-10 flex flex-wrap gap-4">

                    @foreach ($socialMedia as $social)
                        <x-ui.social-link :social="$social" />
                    @endforeach

                </div>

            </div>

            {{-- Right --}}
            <div class="flex justify-center" data-aos="fade-left">

                <div class="relative">

                    <div class="absolute inset-0 rounded-full bg-blue-600 blur-3xl opacity-20">
                    </div>

                    <img src="{{ Storage::url($profile->photo) }}" alt="{{ $profile->full_name }}" loading="lazy"
                        class="relative h-80 w-80 rounded-full border-8 border-white object-cover shadow-2xl lg:h-[430px] lg:w-[430px]">

                </div>

            </div>

        </div>

    </div>

</section>