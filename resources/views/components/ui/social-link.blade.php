@props(['social'])

<a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer"
    class="flex h-11 w-11 items-center justify-center rounded-xl
           border border-slate-700
           text-slate-400
           transition-all
           hover:border-blue-500
           hover:bg-blue-600
           hover:text-white">

    <x-dynamic-component :component="$social->icon" class="h-5 w-5" />

</a>
