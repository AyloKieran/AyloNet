<x-app-layout>
    <x-slot name="title">
        Admin
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto">
            <h1 class="text-3xl font-semibold ">Admin Area</h1>
        </div>
    </div>

    <x-card>
        <div class="flex">
            <h1 class="text-xl font-semibold">Redirections</h1>
            <div class="flex-grow"></div>
            <a href="{{ route('admin.redirections')}}" class="text-right">
                <x-button>
                    Show More
                </x-button>
            </a>
        </div>
        <div class="text-truegray-600">
            <table class="w-100 mt-4">
                <tr class="text-left">
                    <th>Route</th>
                    <th>URL</th>
                    <th class="text">Updated By</th>
                    <th class="text-center">Uses</th>
                </tr>
                @forelse ($redirections as $redirection)
                <tr>
                    <td><a href="{{ route('home') . '/' .  $redirection->route }}">{{ $redirection->route }}</a></td>
                    <td><a href="{{ $redirection->url }}">{{ $redirection->url }}</a></td>
                    <td class="flex">
                        <div class="mr-2">
                            @if(!$redirection->creator()->avatar)
                            <svg class="h-10 w-10 p-1 fill-current text-gray-400 rounded-full bg-gray-600"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            @else
                            <img class="h-10 w-10 rounded-full" src="{{ $redirection->creator()->avatar }}"
                                alt="{{ $redirection->creator()->first()->name }}'s Avatar"
                                title="{{ $redirection->creator()->first()->name }}"></img>
                            @endif
                        </div>
                        <p class="my-auto" title="{{ $redirection->updated_at }}">
                            {{ $redirection->updated_at->diffForHumans(null, false, true) }}</p>
                    </td>
                    <td class="text-center">{{ $redirection->statistics()->first()->usage }}</td>
                </tr>
                @empty
                <tr>
                    <td>There are no redirections to show.
                    <td>
                </tr>
                @endforelse
            </table>
        </div>
    </x-card>

    <x-card>
        <div class="flex">
            <h1 class="text-xl font-semibold">Users</h1>
            <div class="flex-grow"></div>
            <a href="{{ route('admin.users')}}" class="text-right">
                <x-button>
                    Show More
                </x-button>
            </a>
        </div>
        <div class="flex flex-wrap my-4">
            @foreach($users as $user)
            <x-user-card :user="$user" :edit="true" class="w-96 mx-auto my-1"></x-user-card>
            @endforeach
        </div>
    </x-card>

    </div>
</x-app-layout>
