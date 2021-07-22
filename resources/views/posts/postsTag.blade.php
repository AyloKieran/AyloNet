<x-app-layout>
    <x-slot name="title">
        '#{{ $tag }}' Tagged Posts
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto">
            <h1 class="text-3xl font-semibold text-center">'#{{ $tag }}' Tagged Posts</h1>
        </div>
    </div>

    <div class="flex flex-col w-100 max-w-6xl relative mx-auto">
        <x-card class="max-w-6xl">
            @component('components.posts.post-grid', ['posts' => $posts])
                
            @endcomponent
        </x-card>
    </div>

</x-app-layout>
