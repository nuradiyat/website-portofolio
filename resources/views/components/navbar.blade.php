<header x-data="{ open: false }"
    class="fixed inset-x-0 top-0 z-50 border-b border-slate-200/80 bg-white/80 backdrop-blur-lg">

    @php
        $navLinks = [
            ['label' => 'Home', 'id' => 'home'],
            ['label' => 'About', 'id' => 'about'],
            ['label' => 'Skills', 'id' => 'skills'],
            ['label' => 'Projects', 'id' => 'projects'],
            ['label' => 'Certificates', 'id' => 'certificates'],
            ['label' => 'Experience', 'id' => 'experiences'],
            ['label' => 'Contact', 'id' => 'contact'],
        ];
    @endphp

    <div class="container mx-auto flex h-20 items-center justify-between px-4 sm:px-6">
        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex min-w-0 items-center gap-3">
            <span
                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-600 text-lg font-bold text-white">
                MN
            </span>

            <div class="hidden min-w-0 sm:block">
                <h1 class="truncate text-base font-bold text-slate-900 lg:text-lg">
                    {{ $profile->full_name }}
                </h1>
                <p class="truncate text-sm text-slate-500">
                    {{ $profile->profession }}
                </p>
            </div>
        </a>

        {{-- Desktop Menu --}}
        <nav class="hidden items-center gap-7 lg:flex">
            @foreach ($navLinks as $link)
                <a href="{{ route('home') . '#' . $link['id'] }}"
                    class="text-[15px] font-medium text-slate-600 transition hover:text-blue-600">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>

        {{-- Right Side --}}
        <div class="flex items-center gap-3">
            @if ($profile->cv_file)
                <x-button href="{{ Storage::url($profile->cv_file) }}" target="_blank" class="hidden lg:inline-flex">
                    Download CV
                </x-button>
            @endif

            {{-- Mobile Menu Button --}}
            <button @click="open = !open" type="button"
                class="inline-flex items-center justify-center rounded-xl p-2 text-slate-700 transition hover:bg-slate-100 lg:hidden"
                aria-label="Toggle navigation">
                <x-heroicon-o-bars-3 class="h-7 w-7" />
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" x-transition.origin.top x-cloak class="border-t border-slate-200 bg-white lg:hidden">
        <nav class="container mx-auto flex flex-col px-4 py-4 sm:px-6">
            @foreach ($navLinks as $link)
                <a href="{{ route('home') . '#' . $link['id'] }}" @click="open = false"
                    class="rounded-xl px-3 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-50 hover:text-blue-600">
                    {{ $link['label'] }}
                </a>
            @endforeach

            @if ($profile->cv_file)
                <x-button href="{{ Storage::url($profile->cv_file) }}" target="_blank" class="mt-4 justify-center">
                    Download CV
                </x-button>
            @endif
        </nav>
    </div>
</header>
