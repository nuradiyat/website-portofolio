@props(['project'])

<article
    class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">

    {{-- Thumbnail --}}
    <div class="relative overflow-hidden">

        <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->title }}" loading="lazy"
            class="h-56 w-full object-cover transition duration-500 group-hover:scale-105">

        {{-- Status --}}
        <div class="absolute left-4 top-4">

            <x-ui.badge :text="$project->status" />

        </div>

    </div>

    {{-- Content --}}
    <div class="p-6">

        {{-- Title --}}
        <h3 class="text-xl font-bold text-slate-900 line-clamp-1">

            {{ $project->title }}

        </h3>

        {{-- Description --}}
        <p class="mt-3 text-sm leading-7 text-slate-600 line-clamp-3">

            {{ $project->short_description }}

        </p>

        {{-- Skills --}}
        @if ($project->skills->isNotEmpty())

            <div class="mt-5 flex flex-wrap gap-2">

                @foreach ($project->skills as $skill)
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">

                        {{ $skill->name }}

                    </span>
                @endforeach

            </div>

        @endif

        {{-- Footer --}}
        <div class="mt-6 flex items-center justify-between">

            <span class="text-sm text-slate-500">

                {{ optional($project->start_date)->format('M Y') }}
            </span>

            <a href="{{ route('projects.show', $project->slug) }}"
                class="inline-flex items-center gap-2 font-semibold text-blue-600 transition hover:text-blue-700">

                View Details

                <x-heroicon-o-arrow-right class="h-5 w-5" />

            </a>

        </div>

    </div>

</article>
