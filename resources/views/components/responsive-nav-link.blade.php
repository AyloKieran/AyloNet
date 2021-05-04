@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-gray-500 text-base font-medium text-gray-500 bg-gray-50 focus:outline-none focus:text-gray-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-200 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:text-gray-800 focus:bg-gray-100 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
