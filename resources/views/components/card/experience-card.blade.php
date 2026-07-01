@props(['experience'])

<article
    class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-2 hover:shadow-lg">

    <div class="flex items-start gap-4">

        <img src="{{ Storage::url($experience->image) }}" alt="{{ $experience->company_name }}"
            class="h-16 w-16 rounded-xl object-cover">

        <div class="flex-1">

            <h3 class="font-bold text-slate-900">

                {{ $experience->position }}

            </h3>

            <p class="text-sm text-slate-600">

                {{ $experience->company_name }}

            </p>

            <p class="mt-2 text-xs text-slate-500">

                {{ $experience->period }}

            </p>

        </div>

    </div>

</article>
