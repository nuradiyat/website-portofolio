@props(['label', 'value'])

<div
    class="rounded-2xl border border-slate-200 bg-white p-6 text-center shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

    <h3 class="text-3xl font-bold text-blue-600">

        {{ $value }}

    </h3>

    <p class="mt-2 text-sm text-slate-500">

        {{ $label }}

    </p>

</div>
