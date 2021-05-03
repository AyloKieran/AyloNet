<x-app-layout>
    <x-slot name="title">
        User Management
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto flex">
            <h1 class="text-3xl font-semibold ">Users</h1>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-">
        <div class="overflow-hidden shadow-md sm:rounded-lg">
            <div class="p-6 bg-white text-black">
                <div class="flex">
                    <div class="flex-grow"></div>
                    <form class="bg-white rounded-lg shadow text-sm">
                        <input class="border-none focus:outline-none" type="search" name="search" placeholder="Search"
                            value="{{ request()->get('search') }}">
                        <button type="submit" class="px-3">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
                <div class="flex flex-wrap my-4">
                    @foreach($users as $user)
                    <x-user-card :user="$user" :edit="true" class="w-96 mx-auto my-1"></x-user-card>
                    @endforeach
                </div>
                {{ $users->links() }}
            </div>
        </div>
    </div>

    </div>
</x-app-layout>
