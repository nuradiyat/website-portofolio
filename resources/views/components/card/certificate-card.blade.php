@props(['certificate'])

<article
    class="group flex h-full flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

    {{-- Thumbnail --}}
    <div class="relative overflow-hidden">
        <img src="{{ $certificate->thumbnail ? Storage::url($certificate->thumbnail) : 'https://placehold.co/800x500/e2e8f0/64748b?text=Certificate' }}"
            alt="{{ $certificate->title }}" loading="lazy"
            class="h-56 w-full object-cover transition duration-500 group-hover:scale-105">

        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/30 via-transparent to-transparent"></div>

        @if ($certificate->issue_year)
            <div class="absolute left-4 top-4">
                <span
                    class="inline-flex items-center rounded-full bg-white/95 px-3 py-1 text-xs font-semibold text-slate-800 shadow backdrop-blur">
                    {{ $certificate->issue_year }}
                </span>
            </div>
        @endif
    </div>

    {{-- Content --}}
    <div class="flex flex-1 flex-col p-6">

        {{-- Header --}}
        <div>
            <h3 class="line-clamp-2 text-xl font-bold leading-snug text-slate-900">
                {{ $certificate->title }}
            </h3>

            <p class="mt-2 text-sm font-medium text-blue-600">
                {{ $certificate->issuer ?: 'Lembaga penerbit tidak tersedia' }}
            </p>
        </div>

        {{-- Description --}}
        <div class="mt-4">
            <p class="line-clamp-3 text-sm leading-7 text-slate-600">
                {{ $certificate->description ?: 'Sertifikat ini merupakan bagian dari pengembangan kompetensi dan validasi kemampuan profesional.' }}
            </p>
        </div>

        {{-- Divider --}}
        <div class="my-5 h-px bg-slate-200"></div>

        {{-- Certificate Info --}}
        <div class="grid gap-4 sm:grid-cols-2">

            <div class="rounded-2xl bg-slate-50 p-4">
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                    Nomor Sertifikat
                </p>
                <p class="mt-2 break-words text-sm font-medium text-slate-800">
                    {{ $certificate->certificate_number ?: '-' }}
                </p>
            </div>

            <div class="rounded-2xl bg-slate-50 p-4">
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                    Masa Berlaku
                </p>
                <p class="mt-2 text-sm font-medium text-slate-800">
                    {{ $certificate->expired_at ? $certificate->expired_at->format('d M Y') : 'Tidak dicantumkan' }}
                </p>
            </div>

        </div>

        {{-- Actions --}}
        <div class="mt-6 flex flex-col gap-3 sm:flex-row">
            @if ($certificate->credential_url)
                <a href="{{ $certificate->credential_url }}" target="_blank" rel="noopener noreferrer"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">
                    <x-heroicon-o-globe-alt class="h-5 w-5" />
                    Lihat Credential
                </a>
            @endif

            @if ($certificate->pdf_file)
                <a href="{{ Storage::url($certificate->pdf_file) }}" target="_blank" rel="noopener noreferrer"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-slate-300 px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                    <x-heroicon-o-arrow-down-tray class="h-5 w-5" />
                    Download PDF
                </a>
            @endif
        </div>
    </div>
</article>
