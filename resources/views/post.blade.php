<x-app-layout>
    <x-slot name="title">
        {{ $post->title }}
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto">
            <h1 class="text-3xl font-semibold text-center">{{ $post->title }}</h1>
        </div>
    </div>

    <div class="max-w-7xl w-100 flex flex-col xl:flex-row mx-auto">
        <div class="flex-grow"></div>
        <x-card class="flex-grow w-100 mb-0 xl:mb-6">
            <article class="prose w-100 max-w-none">
                {!! $post->content !!}
            </article>
        </x-card>
        <div class="w-96 xl:w-1/2 mx-auto">
            <x-card class="w-96 xl:pl-0">
                <div class="w-100">
                    <a class="flex flex-col mx-auto" href="{{ route('authorPosts', $post->creator() )}}">
                        <div class="mx-auto">
                            @if(!$post->creator()->avatar)
                                <svg class="h-16 w-16 p-1 fill-current text-gray-400 rounded-full bg-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            @else
                                <img class="h-16 w-16 rounded-full object-cover" src="{{ $post->creator()->avatar }}">
                            @endif
                        </div>
                        <span class="w-100 text-center text-md text-black font-semibold overflow-hidden">{{ $post->creator()->name }}</span>
                    </a>
                    <p class="text-truegray-500 mt-2 text-sm text-center" title="{{ $post->created_at }}">Written {{ $post->created_at->diffForHumans(null, false, true) }}</p>
                    @if($post->created_at != $post->updated_at)
                        <p class="text-truegray-500 text-sm text-center" title="{{ $post->updated_at }}">Updated {{ $post->updated_at->diffForHumans(null, false, true) }}</p>
                    @endif
                    @can('admin')
                        <a class="w-100 flex mt-2" href="{{ route('admin.posts.edit', $post ) }}">
                            <x-button class="mx-auto">
                                <span>Edit</span>
                            </x-button>
                        </a>
                    @endcan
                </div>
            </x-card>
            @if ($post->tags)
                <x-card class="w-96 xl:pl-0">
                    <h2 class="mb-2 text-md font-semibold">Tags</h2>
                    <div class="flex flex-wrap inline-flex mt-2 justify-center">
                        @foreach (explode(', ', $post->tags) as $tag)
                            <a href="posts/tag/{{ $tag }}" class="bg-gray-200 hover:bg-gray-300 hover:shadow transition rounded-full px-3 py-1 mr-2 mb-2">#{{ $tag }}</a>
                        @endforeach
                    </div>
                </x-card>
            @endif
            <x-card class="w-96 xl:pl-0">
                <h2 class="mb-2 text-md font-semibold">Recent Posts</h2>
                @foreach ($posts as $post)
                    <div class="flex flex-col mt-2">
                        <div class="bg-gray-50 rounded shadow text-sm text-center p-2">
                            <h3 class="font-bold">{{ $post->title }}</h3>
                            <h4 class="text-xs mb-1 text-gray-500">Written by {{ $post->creator()->name }} - {{ $post->created_at->diffForHumans(null, false, true) }}</h4>
                            <p class="text-xs mb-1">{{ $post->excerpt }}</p>
                            <div class="flex">
                                <div class="flex-grow"></div>
                                <a href="{{ $post->route }}">
                                    <button class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-white hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        <span class="text-xs">Read More</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </x-card>
        </div>
        <div class="flex-grow"></div>
    </div>
</x-app-layout>
