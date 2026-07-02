@props(['skill'])

<div
    class="group flex h-full min-h-[190px] flex-col items-center justify-center rounded-2xl border border-slate-200 bg-white p-5 text-center shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-blue-500 hover:shadow-xl">

    <div
        class="flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-50 transition duration-300 group-hover:bg-blue-50">

        @if ($skill->icon)
            <img src="{{ Storage::url($skill->icon) }}" alt="{{ $skill->name }}"
                class="h-10 w-10 object-contain transition duration-300 group-hover:scale-110" loading="lazy">
        @else
            <x-heroicon-o-code-bracket
                class="h-10 w-10 text-slate-400 transition duration-300 group-hover:scale-110 group-hover:text-blue-500" />
        @endif

    </div>

    <h3 class="mt-4 text-base font-semibold text-slate-900 sm:text-lg">
        {{ $skill->name }}
    </h3>

    <p class="mt-1 text-sm text-slate-500">
        {{ $skill->category }}
    </p>
</div>
