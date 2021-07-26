<x-app-layout>
    <x-slot name="title">
        Edit Upload
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto flex">
            <h1 class="text-3xl font-semibold ">Edit Upload</h1>
        </div>
    </div>

    <div class="max-w-xl mx-auto sm:px-6 lg:px-8 pt-2">
        <div class="overflow-hidden shadow-md sm:rounded-lg">
            <div class="p-6 bg-white text-black">
                <form id="deletePost" method="post" action="{{ route('admin.uploads.delete', [$upload]) }}">
                    @csrf
                    @METHOD('DELETE')
                    <x-button class="bg-red-500 hover:bg-red-600">Delete</x-button>
                </form>
            </div>
        </div>
    </div>

    </div>
</x-app-layout>
