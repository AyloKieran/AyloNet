<x-app-layout>
    <x-slot name="title">
        {{ __('Redirecting') }}
    </x-slot>

    <x-slot name="head">
        <meta http-equiv="refresh" content="0;url={{ $url }}" />
    </x-slot>

    <div class="w-full bg-gray-100 flex flex-col">
        <div class="flex-grow"></div>
        <div class="flex flex-col items-center mt-32 md:mt-64">
            <svg height="100" width="100">
                <circle cx="50" cy="50" r="31" stroke="#679b08" stroke-width="9.5" fill="none" />
                <circle cx="50" cy="50" r="6" stroke="#679b08" stroke-width="1" fill="#679b08" />
                <line x1="50" y1="50" x2="35" y2="50" style="stroke:#679b08;stroke-width:6" />
                <line x1="65" y1="35" x2="50" y2="50" style="stroke:#679b08;stroke-width:6" />
                <path d="M59 65 L83 65 L75 87 Z" fill="#679b08" />
                <rect width="20" height="9" x="70" y="56" style="fill:#eee;stroke-width:0;" />
            </svg>
            <h1 class="text-3xl font-semibold mb-4">Redirecting</h1>
            <p>If you're not redirected, please click the link below.</p>
            <a href="{{ $url }}" class="text-blue-900 underline hover:text-blue-800 text-sm">{{ $url }}</a>
        </div>
        <div class="flex-grow"></div>
    </div>
</x-app-layout>
