<x-app-layout>
    <x-slot name="title">
        Admin Redirections
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto flex">
            <a href="{{ route('admin') }}"><i class="fas fa-long-arrow-alt-left fa-lg mr-4"></i></a>
            <h1 class="text-3xl font-semibold ">Redirections</h1>
        </div>
    </div>

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-2">
            <div class="overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white text-black">
                    <div class="flex">
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
                                <td class="flex">
                                <div class="flex-grow"></div>
                                    <!-- <form method="GET" action="{{ route('admin') . '/redirections/' . $redirection->route . '/edit' }}">
                                        @csrf
                                        <button class="bg-blue-400 w-8 h-8 rounded shadow text-white mr-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </form> -->
                                    <form method="POST" action="{{ route('admin.redirections') . '/' . $redirection->route . '/delete' }}">
                                        @csrf
                                        @method('delete')
                                        <button class="bg-red-400 w-8 h-8 rounded shadow text-white">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
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
