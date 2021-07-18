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
            <div class="flex flex-wrap">
                @foreach($posts as $post)
                <div class="flex flex-col m-1 min-w-min flex-grow">
                    <div class="bg-gray-100 rounded shadow text-sm text-center p-2">
                        <h3 class="font-bold text-md">{{ $post->title }}</h3>
                        <h4 class="text-xs mb-1 text-gray-500">Written by {{ $post->creator()->name }} -
                            {{ $post->created_at->diffForHumans(null, false, true) }}</h4>
                        <p class="text-sm mb-1">{{ $post->excerpt }}</p>
                        <div class="flex">
                            <div class="flex-grow"></div>
                            <a href="/{{ $post->route }}">
                                <button
                                    class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-white hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    <span class="text-sm">Read More</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if ($posts->hasPages())
                <div class="mt-2">
                    {{ $posts->links() }}
                </div>
            @endif
        </x-card>
    </div>

</x-app-layout>
