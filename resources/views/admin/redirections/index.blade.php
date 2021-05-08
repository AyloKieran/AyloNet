<x-app-layout>
    <x-slot name="title">
        Admin Redirections
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto flex">
            <h1 class="text-3xl font-semibold ">Redirections</h1>
        </div>
    </div>

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-2">
            <div class="overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white text-black">
                    <div class="flex">
                        <div class="flex-grow"></div>
                        <div class="flex">
                            <div class="mr-2">
                                <form class="bg-white w-full rounded-lg shadow text-sm">
                                    <input class="border-none focus:outline-none" type="search" name="search" placeholder="Search" value="{{ request()->get('search') }}">
                                    <button type="submit" class="px-3">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>

                            <a href="{{ route('admin.redirections.create') }}" class="my-auto">
                                <x-button>
                                    Create
                                </x-button>
                            </a>
                        </div>
                    </div>
                    <div class="text-truegray-600">
                        <table class="w-100 mt-4 flex flex-col">
                            <tr class="flex text-left w-100">
                                <th class="w-3/12">Route</th>
                                <th class="w-100">URL</th>
                                <th class="w-4/12 text-center lg:text-left">Updated By</th>
                                <th class="w-2/12 text-center hidden lg:inline-block">Last Used</th>
                                <th class="w-2/12 text-center">Uses</th>
                                <th class="w-2/12 text-center">Actions</th>
                            </tr>
                            @forelse ($redirections as $redirection)
                            <tr class="flex">
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
                                            <img class="h-10 w-10 rounded-full" src="{{ $redirection->creator()->avatar }}" alt="{{ $redirection->creator()->first()->name }}'s Avatar" title="{{ $redirection->creator()->first()->name }}"></img>
                                        @endif
                                        <div class="flex-grow lg:flex-grow-0"></div>
                                    </div>
                                    <p class="my-auto" title="{{ $redirection->updated_at }}">{{ $redirection->updated_at->diffForHumans(null, false, true) }}</p>
                                </td>
                                <td class="text-center w-2/12 my-auto hidden lg:inline-block" title="{{ $redirection->statistics->updated_at }}">{{ $redirection->statistics->updated_at->diffForHumans(null, false, true) }}</td>
                                <td class="text-center w-2/12 my-auto">{{ $redirection->statistics()->first()->usage }}</td>
                                <td class="flex w-2/12 my-auto">
                                    <div class="flex-grow"></div>
                                    <a href="{{ route('admin.redirections.edit', [$redirection]) }}">
                                        <button class="bg-blue-400 w-7 h-7 rounded shadow text-white mr-0 md:mr-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </a>
                                    <form method="POST" action="{{ route('admin.redirections.delete', [$redirection]) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="bg-red-400 w-7 h-7 rounded shadow text-white">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <div class="flex-grow"></div>
                                </td>
                            </tr>
                            @empty
                                <tr><td>There are no redirections to show.<td></tr>
                            @endforelse
                        </table>

                        <div class="pt-4">
                            {{ $redirections->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
