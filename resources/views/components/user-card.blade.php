@props(['user', 'edit'])

<div {{ $attributes->merge(['class' => 'flex bg-gray-100 rounded shadow p-3 pr-5 w-screen sm:w-96'])}}>
    <div class="h-20 w-20 flex-shrink-0">
        @if(!$user->avatar)
        <svg class="h-20 w-20 p-1 fill-current text-gray-400 rounded-full bg-gray-600"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
        @else
            @if($user->provider != "google")
                <img class="h-20 w-20 rounded-full shadow object-cover" src="{{ '/' . $user->avatar }}"></img>
            @else
                <img class="h-20 w-20 rounded-full shadow object-cover" src="{{ $user->avatar }}"></img>
            @endif
        @endif
    </div>
    <div class="ml-4 my-auto flex flex-col break-all">
        <span class="text-lg font-semibold h-6 overflow-hidden" title="{{ $user->name }}">
            {{ $user->name }}

            @if($user->can('admin'))
            <span class="text-xs text-gray-600">
                (Admin)
            </span>
            @endif
        </span>
        <span class="text-sm h-5 overflow-hidden">
            {{ $user->email }}
            @if($user->email_verified_at)
            <span class="text-green-700 text-sm">(Verified)</span>
            @else
            <span class="text-red-700 text-sm">(Unverified)</span>
            @endif
        </span>
        <span class="text-xs text-gray-600">
            Joined: <span title="{{ $user->created_at }}">{{ $user->created_at->diffForHumans() }}</span> via
            {{ $user->provider }}
        </span>
        @if($edit ?? '')
            <a href="{{ route('admin.users.edit', [$user]) }}">
                <x-button class="rounded shadow text-white mt-1">
                    Edit
                </x-button>
            </a>
        @endif
    </div>
</div>
