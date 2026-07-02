@props(['skill'])

<div
    class="group flex h-full min-h-[170px] flex-col items-center justify-center rounded-2xl border border-slate-200 bg-white p-4 text-center shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:border-blue-500 hover:shadow-lg sm:min-h-[180px] sm:p-5">

    {{-- Icon --}}
    <div
        class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-50 transition duration-300 group-hover:bg-blue-50 sm:h-16 sm:w-16">
        <img src="{{ $skill->icon ? Storage::url($skill->icon) : 'https://placehold.co/100x100/e2e8f0/64748b?text=Skill' }}"
            alt="{{ $skill->name }}"
            class="h-8 w-8 object-contain transition duration-300 group-hover:scale-110 sm:h-10 sm:w-10" loading="lazy">
    </div>

    {{-- Name --}}
    <h3 class="mt-4 text-sm font-semibold leading-snug text-slate-900 sm:text-base">
        {{ $skill->name }}
    </h3>

    {{-- Category --}}
    <p class="mt-1 text-xs text-slate-500 sm:text-sm">
        {{ $skill->category ?: 'Technology' }}
    </p>
</div>
