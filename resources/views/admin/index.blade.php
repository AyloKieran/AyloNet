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
            <table class="w-100 mt-4 flex flex-col">
                <tr class="flex text-left w-full">
                    <th class="w-3/12">Route</th>
                    <th class="w-100">URL</th>
                    <th class="w-4/12 text-center lg:text-left">Updated By</th>
                    <th class="text-center w-2/12">Uses</th>
                </tr>
                @forelse ($redirections as $redirection)
                <tr class="break-all flex">
                <td class="w-3/12 my-auto"><a href="{{ route('home') . '/' .  $redirection->route }}">{{ Str::limit($redirection->route, 10) }}</a></td>
                    <td class="w-100 my-auto overflow-hidden"><a href="{{ $redirection->url }}">{{ Str::limit($redirection->url, 50) }}</a></td>
                    <td class="flex flex-col lg:flex-row w-4/12 my-auto text-center">
                        <div class="mr-0 lg:mr-2 flex">
                            <div class="flex-grow lg:flex-grow-0"></div>
                            @if(!$redirection->creator()->avatar)
                                <svg class="h-10 w-10 p-1 fill-current text-gray-400 rounded-full bg-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            @else
                                <img class="h-10 w-10 rounded-full" src="{{ $redirection->creator()->avatar }}" alt="{{ $redirection->creator()->name }}'s Avatar" title="{{ $redirection->creator()->name }}"></img>
                            @endif
                            <div class="flex-grow lg:flex-grow-0"></div>
                        </div>
                        <p class="my-auto" title="{{ $redirection->updated_at }}">{{ $redirection->updated_at->diffForHumans(null, false, true) }}</p>
                    </td>
                    <td class="text-center w-2/12 my-auto">{{ $redirection->statistics()->first()->usage }}</td>
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
