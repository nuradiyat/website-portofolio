@props(['skill'])

<div
    class="group rounded-2xl border border-slate-200 bg-white p-6 text-center shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-blue-500 hover:shadow-xl">

    @if ($skill->icon)
        <img src="{{ Storage::url($skill->icon) }}" alt="{{ $skill->name }}" class="mx-auto h-14 w-14 object-contain">
    @endif

    <h3 class="mt-5 text-lg font-semibold text-slate-900">

        {{ $skill->name }}

    </h3>

    <p class="mt-2 text-sm text-slate-500">

        {{ $skill->category }}

    </p>

</div>
