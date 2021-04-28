@props(['active', 'href'])

@php
$classes = ($active ?? false)
            ? 'ml-2 bg-truegray-600 font-bold p-2 mb-1 underline rounded-l-xl shadow-xl'
            : 'ml-8 bg-truegray-600 hover:font-bold mb-1 p-2 rounded-l-xl shadow-xl';
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    <a class="w-full inline-block" {{ $attributes->merge(['href' => $href]) }}>
        {{ $slot }}
    </a>
</div>
