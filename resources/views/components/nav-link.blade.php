@props(['icon', 'active', 'href'])

@php

$classes = ($active ?? false)
            ? 'mb-3 pl-4 text-2xl font-bold'
            : 'mb-3 pl-4 text-lg text-gray-300';
$icon = ($icon ?? null)
            ? $icon
            : '';
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    <a class="w-full inline-block" {{ $attributes->merge(['href' => $href]) }}>
            <span class="inline-block align-middle">{{ $slot }}</span>
    </a>
</div>
