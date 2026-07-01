@props(['certificate'])

<article
    class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-2 hover:shadow-lg">

    <img src="{{ Storage::url($certificate->thumbnail) }}" alt="{{ $certificate->name }}" loading="lazy"
        class="h-52 w-full object-cover transition duration-500 group-hover:scale-105">

    <div class="p-6">

        <h3 class="line-clamp-2 text-lg font-bold text-slate-900">

            {{ $certificate->name }}

        </h3>

        <p class="mt-2 text-sm text-slate-600">

            {{ $certificate->issuer }}

        </p>

        <p class="mt-1 text-sm text-slate-500">

            {{ $certificate->issue_year }}
        </p>

        <div class="mt-5">

            <x-button :href="$certificate->credential_url" target="_blank" variant="outline" size="sm">

                View Credential

            </x-button>

        </div>

    </div>

</article>
