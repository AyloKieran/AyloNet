<x-app-layout>
    <x-slot name="title">
        Admin Posts
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto">
            <h1 class="text-3xl font-semibold text-center">Posts</h1>
        </div>
    </div>

    <div class="flex flex-col w-100 max-w-6xl relative mx-auto">
        <div class="flex w-100 sm:px-6 lg:px-8">
            <div class="flex-grow"></div>
            <div class="flex">
                <div class="mr-2">
                    <form class="bg-white w-full rounded-lg shadow text-sm">
                        <input class="border-none focus:outline-none rounded-lg" type="search" name="search" placeholder="Search"
                            value="{{ request()->get('search') }}">
                        <button type="submit" class="px-3">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>

                <a href="{{ route('admin.posts.create') }}" class="my-auto">
                    <x-button>
                        Create
                    </x-button>
                </a>
            </div>
        </div>
        <x-card class="max-w-6xl">
            @component('components.posts.post-grid', ['posts' => $posts, 'edit' => true])
            @endcomponent
        </x-card>
    </div>

</x-app-layout>
