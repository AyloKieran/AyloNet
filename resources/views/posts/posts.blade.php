<x-app-layout>
    <x-slot name="title">
        Posts
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto">
            <h1 class="text-3xl font-semibold text-center">Posts</h1>
        </div>
    </div>

    <div class="flex flex-col w-100 max-w-6xl relative mx-auto">
        <div class="flex w-100 sm:px-6 lg:px-8">
            <div class="flex-grow"></div>
            <form class="w-100 lg:w-64">
                <input class="bg-white w-full border-none h-10 px-5 pr-16 rounded-lg shadow text-sm focus:outline-none"
                    type="search" name="search" placeholder="Search" value="{{ request()->input('search') }}">
                <button type="submit" class="absolute right-0 sm:right-6 lg:right-8 h-10 px-4 py-1">
                    <i class="fas fa-search leading-7" aria-hidden="true"></i>
                </button>
            </form>
        </div>
        <x-card class="max-w-6xl">
            @component('components.posts.post-grid', ['posts' => $posts])
                
            @endcomponent
        </x-card>
    </div>

</x-app-layout>
