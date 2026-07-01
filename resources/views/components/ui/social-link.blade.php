<a
    href="{{ $social->url }}"
    target="_blank"
    class="flex h-12 w-12 items-center justify-center rounded-full border border-slate-200 transition hover:border-blue-500 hover:bg-blue-500 hover:text-white">

    @switch(strtolower($social->platform))

        @case('github')
            <x-heroicon-o-code-bracket class="h-6 w-6"/>
            @break

        @case('linkedin')
            <x-heroicon-o-user class="h-6 w-6"/>
            @break

        @case('instagram')
            <x-heroicon-o-camera class="h-6 w-6"/>
            @break

        @case('email')
            <x-heroicon-o-envelope class="h-6 w-6"/>
            @break

        @default
            <x-heroicon-o-globe-alt class="h-6 w-6"/>

    @endswitch

</a>