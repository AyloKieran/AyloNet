<x-app-layout>
    <x-slot name="title">
        Create Upload
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto flex">
            <h1 class="text-3xl font-semibold ">Create Upload</h1>
        </div>
    </div>

    <div class="max-w-xl mx-auto sm:px-6 lg:px-8 pt-2">
        <div class="overflow-hidden shadow-md sm:rounded-lg">
            <div class="p-6 bg-white text-black">
                <form method="post" enctype="multipart/form-data" class="flex flex-col gap-4">
                    @csrf
                    <x-input id="file" name="file" type="file" class="w-100"></x-input>

                        @error('file')
                            <p class="text-red-400">{{ $message }}</p>
                        @enderror

                    <x-button type="submit" name="submit" class="text-center mx-auto">
                        {{ __('Upload') }}
                    </x-button>

                </form>
            </div>
        </div>
    </div>

    </div>
</x-app-layout>
