@props([
    'testimonial',
])

<article
    class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm transition hover:-translate-y-2 hover:shadow-lg">

    <x-heroicon-s-chat-bubble-left-right
        class="mb-5 h-10 w-10 text-blue-600" />

    <p class="leading-7 text-slate-600 italic">

        "{{ $testimonial->content }}"

    </p>

    <div class="mt-8">

        <h4 class="font-bold text-slate-900">

            {{ $testimonial->name }}

        </h4>

        <p class="text-sm text-slate-500">

            {{ $testimonial->position }}

            @if($testimonial->company)

                • {{ $testimonial->company }}

            @endif

        </p>

    </div>

</article>