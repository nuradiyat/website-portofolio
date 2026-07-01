<header x-data="{ open: false }"
    class="fixed inset-x-0 top-0 z-50 border-b border-slate-200/80 bg-white/80 backdrop-blur-lg">

    <div class="container mx-auto flex h-20 items-center justify-between px-6">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-3">

            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-600 text-lg font-bold text-white">

                MN

            </span>

            <div class="hidden sm:block">

                <h1 class="font-bold text-slate-900">

                    {{ $profile->full_name }}

                </h1>

                <p class="text-sm text-slate-500">

                    {{ $profile->profession }}

                </p>

            </div>

        </a>

        {{-- Desktop Menu --}}
        <nav class="hidden lg:flex items-center gap-8">

            <a href="#home" class="font-medium text-slate-600 hover:text-blue-600 transition">
                Home
            </a>

            <a href="#about" class="font-medium text-slate-600 hover:text-blue-600 transition">
                About
            </a>

            <a href="#skills" class="font-medium text-slate-600 hover:text-blue-600 transition">
                Skills
            </a>

            <a href="#projects" class="font-medium text-slate-600 hover:text-blue-600 transition">
                Projects
            </a>

            <a href="#certificates" class="font-medium text-slate-600 hover:text-blue-600 transition">
                Certificates
            </a>

            <a href="#experiences" class="font-medium text-slate-600 hover:text-blue-600 transition">
                Experience
            </a>

            <a href="#contact" class="font-medium text-slate-600 hover:text-blue-600 transition">
                Contact
            </a>

        </nav>

        {{-- Right Side --}}
        <div class="flex items-center gap-3">

            <x-button href="{{ Storage::url($profile->cv_file) }}" target="_blank" class="hidden lg:inline-flex">

                Download CV

            </x-button>

            {{-- Mobile Menu Button --}}
            <button @click="open=!open" class="rounded-lg p-2 lg:hidden">

                <x-heroicon-o-bars-3 class="h-7 w-7" />

            </button>

        </div>

    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" x-transition class="border-t bg-white lg:hidden">

        <nav class="container mx-auto flex flex-col px-6 py-5">

            <a href="#home" class="py-3">Home</a>

            <a href="#about" class="py-3">About</a>

            <a href="#skills" class="py-3">Skills</a>

            <a href="#projects" class="py-3">Projects</a>

            <a href="#certificates" class="py-3">Certificates</a>

            <a href="#experiences" class="py-3">Experience</a>

            <a href="#contact" class="py-3">Contact</a>

            <x-button href="{{ Storage::url($profile->cv_file) }}" class="mt-5 justify-center">

                Download CV

            </x-button>

        </nav>

    </div>

</header>