<x-app-layout>
    <x-slot name="title">
        Create Post
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto">
            <h1 class="text-3xl font-semibold ">Create Post</h1>
        </div>
    </div>

    <x-card class="pt-4">
        <div class="mt-2 flex flex-col">
            <form method="post">
                @csrf
                <div class="flex flex-col mb-1">
                    <x-label for="title" class="font-bold">Title</x-label>
                    <x-input id="title" name="title" class="{{ $errors->has('title') ? 'border-red-400' : '' }} px-1" value="{{ old('title') }}"></x-input>
                    @error('title')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-1">
                    <x-label for="route" class="font-bold">Route</x-label>
                    <x-input id="route" name="route" class="{{ $errors->has('route') ? 'border-red-400' : '' }} px-1" value="{{ old('route') }}"></x-input>
                    @error('route')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-1">
                    <x-label for="excerpt" class="font-bold">Excerpt</x-label>
                    <x-input id="excerpt" name="excerpt" class="{{ $errors->has('excerpt') ? 'border-red-400' : '' }} px-1" value="{{ old('excerpt') }}"></x-input>
                    @error('excerpt')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <x-label for="content" class="font-bold">Content</x-label>
                    <textarea id="content" name="content" class="{{ $errors->has('content') ? 'border-red-400' : '' }} px-1">{{ old('content') }}</textarea>
                    @error('content')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex">
                    <div class="flex-grow"></div>
                    <x-button class="mt-4">Create</x-button>
                </div>
            </form>
        </div>
    </x-card>

    <x-editor />
</x-app-layout>
