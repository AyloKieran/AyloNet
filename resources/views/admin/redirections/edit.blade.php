<x-app-layout>
    <x-slot name="title">
        Edit Redirection
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto flex">
            <h1 class="text-3xl font-semibold ">Edit Redirection</h1>
        </div>
    </div>

    <div class="max-w-xl mx-auto sm:px-6 lg:px-8 pt-2">
        <div class="overflow-hidden shadow-md sm:rounded-lg">
            <div class="p-6 bg-white text-black">
                <form id="deletePost" method="post" action="{{ route('admin.redirections.delete', [$redirection]) }}">
                    @csrf
                    @METHOD('DELETE')
                </form>
                <form method="post" enctype="multipart/form-data" class="flex flex-col gap-4">
                    @csrf
                    @method('PATCH')
                    <div class="grid grid-cols-2 items-center">
                        <label for="route">Route:</label>
                        <input type="text" name="route" id="route" value="{{ $redirection->route }}"
                            class="rounded-lg shadow border-gray-300 text-gray-500 bg-gray-100" disabled>
                    </div>
                    <div class="grid grid-cols-2 items-center">
                        <label for="url">Url:</label>
                        <input type="url" name="url" id="url" value="{{ $redirection->url }}"
                            class="rounded-lg shadow border-gray-300">

                        @error('url')
                            <p class="text-red-400 col-span-3">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex">
                        <div class="flex-grow"></div>
                        <x-button class="bg-red-500 hover:bg-red-600 mr-1" form="deletePost">Delete</x-button>
                        <x-button class="">Update</x-button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    </div>
</x-app-layout>
