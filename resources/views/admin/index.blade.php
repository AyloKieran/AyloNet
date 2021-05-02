<x-app-layout>
    <x-slot name="title">
        Admin
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto">
            <h1 class="text-3xl font-semibold ">Admin Area</h1>
        </div>
    </div>

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-2">
            <div class="overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white text-black">
                    <div class="flex">
                        <h1 class="text-lg font-semibold">Redirections</h1>
                        <div class="flex-grow"></div>
                        <a href="{{ route('admin.redirections.create') }}">Create</a>
                    </div>
                    <div class="text-truegray-600">
                        <table class="w-100 mt-4">
                            <tr class="text-left">
                                <th>Route</th>
                                <th>URL</th>
                                <th class="text-center">Creator</th>
                                <th class="text-center">Uses</th>
                            </tr>
                            @forelse ($redirections as $redirection)
                            <tr>
                                <td><a href="{{ route('home') . '/' .  $redirection->route }}">{{ $redirection->route }}</a></td>
                                <td><a href="{{ $redirection->url }}">{{ $redirection->url }}</a></td>
                                <td>
                                    <img src="{{ $redirection->creator()->avatar }}" class="w-8 rounded-full mx-auto" alt="{{ $redirection->creator()->first()->name }}"></img>
                                </td>
                                <td class="text-center">{{ $redirection->statistics()->first()->usage }}</td>
                            </tr>
                            @empty
                                <tr><td>There are no redirections to show.<td></tr>
                            @endforelse
                        </table>
                        <div class="flex mt-4">
                            <div class="flex-grow"></div>
                            <a href="{{ route('admin.redirections')}}" class="text-right">Show All</a>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
