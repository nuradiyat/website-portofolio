@props([
    'rows' => 6,
])

<textarea rows="{{ $rows }}"
    {{ $attributes->merge([
        'class' => '
                block
                w-full
                rounded-xl
                border
                border-slate-300
                bg-white
                px-4
                py-3
                text-slate-700
                placeholder:text-slate-400
                shadow-sm
                transition
                duration-300
                resize-none
                focus:border-blue-600
                focus:outline-none
                focus:ring-4
                focus:ring-blue-100
            ',
    ]) }}>{{ $slot }}</textarea>
