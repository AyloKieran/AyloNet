<div class="grid xl:grid-cols-2">
    @foreach($posts as $post)
    <div class="flex flex-col m-1">
        <div class="flex flex-col bg-gray-100 rounded shadow text-sm text-center p-2 h-full">
            <h3 class="font-bold text-md">{{ $post->title }}</h3>
            <h4 class="text-xs mb-1 text-gray-500">Written by {{ $post->creator()->name }} -
                {{ $post->created_at->diffForHumans(null, false, true) }}</h4>
            <p class="text-sm mb-1">{{ $post->excerpt }}</p>
            <div class="flex-grow"></div>
            <div class="flex">
                <div class="flex-grow"></div>
                @if ($edit ?? false)
                    <a href="{{ route('admin.posts.edit', $post ) }}" class="mr-1">
                        <button
                            class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-white hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <span class="text-sm">Edit</span>
                        </button>
                    </a>
                @endif
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