@props(['title', 'subtitle' => null])

<div class="max-w-3xl mx-auto text-center mb-16">

    <span class="text-blue-600 font-semibold uppercase tracking-widest">

        {{ $title }}

    </span>

    <h2 class="mt-3 text-3xl md:text-4xl font-bold text-slate-900">

        {{ $subtitle }}

    </h2>

</div>
