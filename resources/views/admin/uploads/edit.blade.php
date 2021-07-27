<x-app-layout>
    <x-slot name="title">
        Edit Upload
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto flex">
            <h1 class="text-3xl font-semibold ">Edit Upload</h1>
        </div>
    </div>

    <div class="max-w-xl w-100 mx-auto sm:px-6 lg:px-8 pt-2">
        <div class="overflow-hidden shadow-md sm:rounded-lg">
            <div class="p-6 bg-white text-black">
                <form id="deletePost" method="post" action="{{ route('admin.uploads.delete', [$upload]) }}">
                    @csrf
                    @METHOD('DELETE')
                </form>
                <form method="post">
                    @csrf
                    @METHOD('PATCH')
                    <div class="flex flex-col mb-1">
                        <x-label for="name" class="font-bold">Name</x-label>
                        <x-input id="name" name="name" class="{{ $errors->has('name') ? 'border-red-400' : '' }} px-1" value="{{ $upload->name }}"></x-input>
                        @error('name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex">
                        <div class="flex-grow"></div>
                        <x-button class="mt-4 bg-red-500 hover:bg-red-600 mr-1" form="deletePost">Delete</x-button>
                        <x-button class="mt-4">Update</x-button>
                    </div>
                </form>
                <div class="pt-4">
                    @component('components.uploads.media', ['upload' => $upload])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>

    </div>
</x-app-layout>
